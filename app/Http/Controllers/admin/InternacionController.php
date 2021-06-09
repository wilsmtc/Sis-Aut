<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clinica;
use App\Models\Admin\Consulta;
use App\Models\Admin\Ficha;
use App\Models\Admin\Historial;
use App\Models\Admin\Internacion;
use App\Models\Admin\Signos_vitales;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class InternacionController extends Controller
{
    public function index()
    {
        $datos = Internacion::where('estado',0)->orderBy('id')->get();
        return view('admin.internacion.index',compact('datos'));
    }

    public function index_alta()
    {
        $datos = Internacion::where('estado',1)->orderBy('id')->get();
        return view('admin.internacion.index_alta',compact('datos'));
    }

    public function create($id)
    {   
        Ficha::findOrFail($id)->update([
            'estado'=>1        
        ]);
        $ficha=Ficha::findOrFail($id);
        $consulta_vector=Consulta::where('ficha_id',$id)->get();
        //dd($consulta_vector[0]["id"]);
        $consulta=Consulta::findOrFail($consulta_vector[0]["id"]);
        //dd($consulta->id);
        $signos_vitales_vector=Signos_vitales::where('consulta_id',$consulta->id)->get();
        Signos_vitales::findOrFail($signos_vitales_vector[0]["id"])->update([
            'estado'=>1 
        ]);
        $SVM=Signos_vitales::findOrFail($signos_vitales_vector[0]["id"]);
        $historial=Historial::where('paciente_id',$ficha->paciente_id)->get();
        if($historial->count()==0)
            $sangre=null;
        else{
            $historial=Historial::findOrFail($historial[0]["id"]);
            $sangre=$historial->t_sangre;
        }   
        return view('admin.internacion.crear',compact('ficha','consulta','sangre','SVM'));
    }

    public function store(Request $request)
    {
        Internacion::create($request->all());
        return redirect('admin/internacion')->with('mensaje','Datos Registrados correctamente');
    }

    public function edit($id)
    {
        $dato = Internacion::findOrfail($id);
        $consulta=Consulta::findOrFail($dato->consulta_id);
        $ficha=Ficha::findOrFail($consulta->ficha_id);
        $signos_vitales_vector=Signos_vitales::where('consulta_id',$consulta->id)->get();
        $SVM=Signos_vitales::findOrFail($signos_vitales_vector[0]["id"]);
        $historial=Historial::where('paciente_id',$ficha->paciente_id)->get();
        if($historial->count()==0)
            $sangre=null;
        else{
            $historial=Historial::findOrFail($historial[0]["id"]);
            $sangre=$historial->t_sangre;
        }
        return view('admin.internacion.editar', compact('dato','consulta','ficha','SVM','sangre'));
    }

    public function update(Request $request, $id)
    {
        Internacion::findOrFail($id)->update($request->all());
        return redirect('admin/internacion')->with('mensaje', 'Datos actualizados con exito');
    }

    public function imprimir_entrada($id)//es ek ud de la internacion
    {
        $internacion=Internacion::findOrFail($id);
        $consulta=Consulta::findOrFail($internacion->consulta_id);
        $signos_vitales_vector=Signos_Vitales::where('consulta_id',$consulta->id)->get();
        $signos_vitales=Signos_vitales::findOrFail($signos_vitales_vector[0]["id"]);
        $clinica = Clinica::findOrFail(1);   
        if($clinica->logo==null)
            $image = base64_encode(file_get_contents(public_path("assets/lte/assets/images/gallery/bayern.png")));
        else
            $image = base64_encode(file_get_contents(public_path("storage/datos/fotos/clinica/$clinica->logo")));
        $pdf=PDF::loadview('admin.internacion.imprimir_entrada', compact('clinica','image','internacion','signos_vitales'));
        return $pdf->stream('ficha.pdf');
    }
    public function solicitar_alta($id)
    {
        $dato = Internacion::findOrfail($id);
        $consulta=Consulta::findOrFail($dato->consulta_id);
        $ficha=Ficha::findOrFail($consulta->ficha_id);
        $signos_vitales_vector=Signos_vitales::where('consulta_id',$consulta->id)->get();
        $SVM=Signos_vitales::findOrFail($signos_vitales_vector[0]["id"]);
        $historial=Historial::where('paciente_id',$ficha->paciente_id)->get();
        if($historial->count()==0)
            $sangre=null;
        else{
            $historial=Historial::findOrFail($historial[0]["id"]);
            $sangre=$historial->t_sangre;
        }
        return view('admin.internacion.alta', compact('dato','consulta','ficha','SVM','sangre'));
    }
    public function dar_alta(Request $request, $id)
    {   
        $vector=$request->fotos;
        if($vector!=null){
            $fotos=array();
            $i=0;
            foreach($vector as $dato){         
                $fotos[$i]["foto"]=Internacion::setFoto($dato);
                $i++;
            }
            $fotos_cadena=json_encode($fotos);
            $request->request->add(['foto_evolucion' => $fotos_cadena]);  
        }
        $request->request->add(['estado' =>1]);
        Internacion::findOrFail($id)->update($request->all());
        return redirect('admin/internacion_alta')->with('mensaje', 'Registro guardado con exito');
    }
    public function imprimir_forzoso($id)//es ek ud de la internacion
    {
        $internacion=Internacion::findOrFail($id);
        $consulta=Consulta::findOrFail($internacion->consulta_id);
        $signos_vitales_vector=Signos_Vitales::where('consulta_id',$consulta->id)->get();
        $signos_vitales=Signos_vitales::findOrFail($signos_vitales_vector[0]["id"]);
        $clinica = Clinica::findOrFail(1);   
        if($clinica->logo==null)
            $image = base64_encode(file_get_contents(public_path("assets/lte/assets/images/gallery/bayern.png")));
        else
            $image = base64_encode(file_get_contents(public_path("storage/datos/fotos/clinica/$clinica->logo")));
        $pdf=PDF::loadview('admin.internacion.imprimir_forzoso', compact('clinica','image','internacion','signos_vitales'));
        return $pdf->stream('ficha.pdf');
    }
    public function imprimir_todo($id)//es ek ud de la internacion
    {
        $internacion=Internacion::findOrFail($id);
        $consulta=Consulta::findOrFail($internacion->consulta_id);
        $signos_vitales_vector=Signos_Vitales::where('consulta_id',$consulta->id)->get();
        $signos_vitales=Signos_vitales::findOrFail($signos_vitales_vector[0]["id"]);
        $clinica = Clinica::findOrFail(1);   
        if($clinica->logo==null)
            $image = base64_encode(file_get_contents(public_path("assets/lte/assets/images/gallery/bayern.png")));
        else
            $image = base64_encode(file_get_contents(public_path("storage/datos/fotos/clinica/$clinica->logo")));
        if ($internacion->foto_evolucion==null) {
            $fotos=null;
        } else {
            $fotos=$internacion->foto_evolucion;
            $fotos=json_decode($fotos);
        }
            
        $pdf=PDF::loadview('admin.internacion.imprimir_todo', compact('clinica','image','internacion','signos_vitales','fotos'));
        return $pdf->stream('ficha.pdf');
    }
}
