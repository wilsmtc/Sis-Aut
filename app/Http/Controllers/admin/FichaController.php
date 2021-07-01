<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Calendario_consulta;
use App\Models\Admin\Clinica;
use App\Models\Admin\Ficha;
use App\Models\Admin\Paciente;
use App\Models\Admin\Servicio;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;


class FichaController extends Controller
{

    public function index(Request $request)
    {      
        // $servicios=Servicio::orderBy('id')->get();                        
        // if($request->ver_fecha==null){
        //     $fecha_actual = new \DateTime();
        //     $fecha_actual=$fecha_actual->format('Y-m-d');                           
        //     $datos = Ficha::where('fecha',$fecha_actual)->orderBy('id','desc')->get();
        //     return view('admin.ficha.index',compact('datos','servicios','fecha_actual')); 
        // }
        // else{
        //     $fecha_actual=$request->ver_fecha;
        //     $datos = Ficha::where('fecha',$fecha_actual)->orderBy('id','desc')->get();
        //     return view('admin.ficha.index',compact('datos','servicios','fecha_actual')); 
        // }           
    }

    public function index_fichaje(Request $request)
    {        
        $servicio = Servicio::findOrFail(1);
        if($request->search!=null){
            $seleccion=$request->seleccion;          
            $query= trim($request->get('search'));
            $search=$query;         
            $datos=Paciente::where([
                ['estado',1],
                [$seleccion, 'LIKE', '%'. $query . '%'],
            ])->get();
            return view('admin.ficha.index', compact('servicio','search','datos')); 
        }
        else{
            $search=null;
            $datos=null;
            if($request->ver_fecha==null){
                $fecha_actual = new \DateTime();
                $fecha_actual=$fecha_actual->format('Y-m-d');
                $fichas = Ficha::where([
                ['servicio_id',1],
                ['fecha',$fecha_actual],
                ])->orderBy('id','desc')->get();
                return view('admin.ficha.index', compact('servicio','search','datos','fichas','fecha_actual'));     
            }
            else{
                $fecha_actual=$request->ver_fecha;
                //Calculo de estado 2
                $fichas_cero= Ficha::where([
                    ['servicio_id',1],
                    ['fecha',$fecha_actual],
                    ['estado', 0]
                ])->get();
                $fecha_act = new \DateTime();
                $fecha_act=$fecha_act->format('Y-m-d');
                foreach($fichas_cero as $F_C){
                    if ($F_C->fecha<$fecha_act) {
                        Ficha::findOrFail($F_C->id)->update([
                            'estado'=>2
                        ]);
                    }
                }
                //Fin del calculo de estado 2
                $fichas = Ficha::where([
                    ['servicio_id',1],
                    ['fecha',$fecha_actual],
                ])->orderBy('id','desc')->get();
                
                return view('admin.ficha.index', compact('servicio','search','datos','fichas','fecha_actual'));
            }         
        }       
    }

    public function create($id, Request $request)
    {
        $servicio = Servicio::findOrFail($id);
        if($request->search!=null){
            $seleccion=$request->seleccion;          
            $query= trim($request->get('search'));
            $search=$query;         
            $datos=Paciente::where($seleccion, 'LIKE', '%'. $query . '%')->get();
            return view('admin.ficha.crear', compact('servicio','search','datos')); 
        }
        else{
            $search=null;
            $datos=null;
            if($request->ver_fecha==null){
                $fecha_actual = new \DateTime();
                $fecha_actual=$fecha_actual->format('Y-m-d');
                $fichas = Ficha::where([
                ['servicio_id',$id],
                ['fecha',$fecha_actual],
                ])->orderBy('id','desc')->get();
                return view('admin.ficha.crear', compact('servicio','search','datos','fichas','fecha_actual'));     
            }
            else{
                $fecha_actual=$request->ver_fecha;
                $fichas = Ficha::where([
                    ['servicio_id',$id],
                    ['fecha',$fecha_actual],
                    ])->orderBy('id','desc')->get();
                return view('admin.ficha.crear', compact('servicio','search','datos','fichas','fecha_actual'));
            }         
        }
        
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $horarios=Calendario_consulta::where('fecha',$request->fecha)->get();
        $cadena=$horarios[0]["horario"];
        $vector=json_decode($cadena);//convierte una cadena en vector
        $vector[($request->hora)-1]->estado="ocupado";
        $hora=$vector[($request->hora)-1]->hora;
        $nueva_cadena=json_encode($vector);//convierte un vector en cadena
        $horario=Calendario_consulta::findOrFail($horarios[0]["id"]);
        $horario->update([
            'horario'=>$nueva_cadena        
        ]);
        $request->request->add(['turno' => $request->hora]);
        $request->request->add(['hora' => $hora]);
        Ficha::create($request->all());
        return redirect("admin/fichaje")->with('mensaje','Ficha creado con exito');
    }


    public function edit($id)
    {
        $ficha=Ficha::findOrFail($id);
        $paciente=Paciente::findOrFail($ficha->paciente_id);
        return view('admin.ficha.editar', compact('ficha','paciente'));
    }


    public function update(Request $request, $id)
    {
        //dd($request->all());
        if($request->hora){
            $ficha=Ficha::findOrFail($id);
            $horarios=Calendario_consulta::where('fecha',$ficha->fecha)->get();
            $cadena=$horarios[0]["horario"];
            $vector=json_decode($cadena);//convierte una cadena en vector
            $vector[($ficha->turno)-1]->estado="libre";
            $nueva_cadena=json_encode($vector);//convierte un vector en cadena
            $horario=Calendario_consulta::findOrFail($horarios[0]["id"]);
            $horario->update([
                'horario'=>$nueva_cadena        
            ]);

            $horarios=Calendario_consulta::where('fecha',$request->fecha)->get();
            $cadena=$horarios[0]["horario"];
            $vector=json_decode($cadena);//convierte una cadena en vector
            $vector[($request->hora)-1]->estado="ocupado";
            $hora=$vector[($request->hora)-1]->hora;
            $nueva_cadena=json_encode($vector);//convierte un vector en cadena
            $horario=Calendario_consulta::findOrFail($horarios[0]["id"]);
            $horario->update([
                'horario'=>$nueva_cadena        
            ]);

            $request->request->add(['turno' => $request->hora]);
            $request->request->add(['hora' => $hora]);
            Ficha::findOrFail($id)->update($request->all());
            return redirect("admin/fichaje")->with('mensaje','Ficha actualizada con exito');
        }
        else{
            return redirect("admin/fichaje")->with('mensaje','Ficha actualizada con exito');
        }
        // Ficha::findOrFail($id)->update($request->all());
        // return redirect("admin/ficha/consulta")->with('mensaje','Ficha actualizada con exito');
    }


    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) { 
            try {
                $ficha=Ficha::findOrFail($id);
                $horarios=Calendario_consulta::where('fecha',$ficha->fecha)->get();
                $cadena=$horarios[0]["horario"];
                $vector=json_decode($cadena);//convierte una cadena en vector
                $vector[($ficha->turno)-1]->estado="libre";
                $nueva_cadena=json_encode($vector);//convierte un vector en cadena
                $horario=Calendario_consulta::findOrFail($horarios[0]["id"]);
                $horario->update([
                    'horario'=>$nueva_cadena        
                ]);
                //Eliminar registro
                Ficha::destroy($id);
                $aux=1;
            } catch (\Illuminate\Database\QueryException $e) {
                $aux=0;
            }    
            if($aux==1){                
                return response()->json(['mensaje' => 'ok']);                                  
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
             abort(404);
        }   
    }

    public function imprimir($id)
    {
        $ficha = Ficha::findOrFail($id);
        $clinica = Clinica::findOrFail(1);
        if($clinica->logo==null)
            $image = base64_encode(file_get_contents(public_path("assets/lte/assets/images/gallery/bayern.png")));
        else
            $image = base64_encode(file_get_contents(public_path("storage/datos/fotos/clinica/$clinica->logo")));
        $pdf=PDF::loadview('admin.ficha.imprimir_ficha', compact('ficha','clinica','image'));
        return $pdf->stream('ficha.pdf');
    }

    public function registrar($id)
    {
        $paciente=Paciente::findOrFail($id);
        return view('admin.ficha.registrar', compact('paciente'));
    }
    
    public function horario(Request $request)
    {      
        if ($request->ajax()) {
            $fecha=request()->fecha;
            $aux1=Calendario_consulta::where('fecha',$fecha)->get();
            if($aux1->count()==0){
                $cadena="<span class="."blue".">no hay turnos disponibles, elija otra fecha</span>";
                return response()->json(['mensaje' =>'no','horario' =>$cadena]);
            }
            else{
                $horarios=$aux1[0]["horario"];
                $horarios=json_decode($horarios);
                $cadena="<select id='hora' name='hora' class="."form-control"." required>";
                $cadena=$cadena."<option value=''>  Elija un turno  </option>";
                foreach ($horarios as $horario) {
                    if($horario->estado=='libre'){
                        $cadena=$cadena.'<option value='.$horario->orden.'>'. $horario->hora.'</option>';
                    }
                }
                $cadena."</select>";
                return response()->json(['mensaje' =>'si','horario' =>$cadena]);
            }
        } else {
            abort(404);
        } 
    }
}
