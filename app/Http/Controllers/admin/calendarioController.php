<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Calendario_consulta;
use App\Models\Admin\Ficha;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class calendarioController extends Controller
{

    public function calendario()
    {
        return view('admin.consulta.calendario');
    }

    public function index()
    {
        return view('admin.consulta.calendario');
    }
    public function create()
    {
        //
    }

    public function guardar_calendario(Request $request)
    {
        if(Auth::user()->rol->añadir == 1){
            $inicio=new DateTime(request()->inicio);
            $fin=new DateTime(request()->fin);
            $diferencia_total=$inicio->diff($fin);
            $num_consultas=(($diferencia_total->format('%H')*60)+$diferencia_total->format('%i'))/request()->intervalo;
            $intervalo=request()->intervalo;
            $horario=array();
            $aux1=$inicio;
            for($i=0;$i<$num_consultas;$i++){
                $horario[$i]["orden"]=$i+1;
                $x=$aux1->format('H:i');
                $aux2=$aux1->modify("+ $intervalo minute");
                $horario[$i]["hora"]=$x;
                $aux1=$aux2;
                $horario[$i]["estado"]='libre';
            }
            $request->request->add(['num_consultas' => $num_consultas]);
            $request->request->add(['start' => new DateTime(request()->inicio)]);
            $request->request->add(['end' => $fin]);
            $horario=json_encode($horario);
            $request->request->add(['horario' => $horario]);
            $datos=request()->all();
            if ($request->ajax()) {
                $calendario=Calendario_consulta::create($request->all());
                return response()->json(['mensaje' =>'ok', 'datos' => $calendario]);
            } else {
                abort(404);
            }
        }
        else{
            return response()->json(['mensaje' =>'no']);
        }           
    }


    public function show()
    {
        $dias=Calendario_consulta::where('title','Día Hábil')->get();
        $fecha_hoy= date("Y-m-d H:i:s");
        foreach($dias as $dia){
            if($dia->end<$fecha_hoy){
                $aux=Calendario_consulta::findOrFail($dia->id);
                $aux->color="#ff0000";
                $aux->title="Atendido";
                $aux->save();
            }
        }

        $data["eventos"]=Calendario_consulta::all();
        return response()->json($data["eventos"]);
    }

    public function verificar(Request $request)
    {
        if ($request->ajax()) {
            $horarios=Calendario_consulta::where('fecha',request()->fecha)->get();
            if($horarios->count()==0){
                return response()->json(['mensaje' =>'no']);
            }
            else{
                return response()->json(['mensaje' =>'si']);
            }
        } else {
            abort(404);
        }
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            if (Auth::user()->rol->editar == 1) {
                $contador=Ficha::where('fecha',request()->fecha)->count();
                if ($contador>0) {
                    return response()->json(['mensaje' =>'no']);
                } else {
                    $id=request()->id;
                    $inicio=new DateTime(request()->inicio);
                    $fin=new DateTime(request()->fin);
                    $diferencia_total=$inicio->diff($fin);
                    $num_consultas=(($diferencia_total->format('%H')*60)+$diferencia_total->format('%i'))/request()->intervalo;
                    $intervalo=request()->intervalo;
                    $horario=array();
                    $aux1=$inicio;
                    for($i=0;$i<$num_consultas;$i++){
                        $horario[$i]["orden"]=$i+1;
                        $x=$aux1->format('H:i');
                        $aux2=$aux1->modify("+ $intervalo minute");
                        $horario[$i]["hora"]=$x;
                        $aux1=$aux2;
                        $horario[$i]["estado"]='libre';
                    }
                    $request->request->add(['num_consultas' => $num_consultas]);
                    $request->request->add(['start' => new DateTime(request()->inicio)]);
                    $request->request->add(['end' => $fin]);
                    $horario=json_encode($horario);
                    $request->request->add(['horario' => $horario]);
                    Calendario_consulta::findOrFail($id)->update($request->all());
                    return response()->json(['mensaje' =>'ok']);
                }
            } 
            else {
                return response()->json(['mensaje' =>'sin permiso']);
            }
            
                

        } else {
            abort(404);
        }
    }

    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            if (Auth::user()->rol->eliminar == 1) {
                    $contador=Ficha::where('fecha',request()->fecha)->count();
                if ($contador>0) {
                    return response()->json(['mensaje' =>'no']);
                } else {
                    try {
                        //Eliminar registro
                        Calendario_consulta::destroy(request()->id);
                        $aux=1;
                    } catch (\Illuminate\Database\QueryException $e) {
                        $aux=0;
                    }    
                    if($aux==1){                
                        return response()->json(['mensaje' => 'ok']);                                  
                    } else {
                        return response()->json(['mensaje' => 'no']);
                    }
                }   
            } else {
                return response()->json(['mensaje' => 'sin permiso']);
            }
            
                  
        } else {
            abort(404);
        }
    }
}
