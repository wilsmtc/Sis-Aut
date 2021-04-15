<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ficha;
use App\Models\Admin\Paciente;
use App\Models\Admin\Servicio;
use Illuminate\Http\Request;

class FichaController extends Controller
{

    public function index(Request $request)
    {      
        $servicios=Servicio::orderBy('id')->get();                        
        if($request->ver_fecha==null){
            $fecha_actual = new \DateTime();
            $fecha_actual=$fecha_actual->format('Y-m-d');                           
            $datos = Ficha::where('fecha',$fecha_actual)->orderBy('id','desc')->get();
            return view('admin.ficha.index',compact('datos','servicios','fecha_actual')); 
        }
        else{
            $fecha_actual=$request->ver_fecha;
            $datos = Ficha::where('fecha',$fecha_actual)->orderBy('id','desc')->get();
            return view('admin.ficha.index',compact('datos','servicios','fecha_actual')); 
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
        Ficha::create($request->all());

        return redirect("admin/ficha/$request->servicio_id/crear")->with('mensaje','Ficha creado con exito');
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //dd($request->all());
        Ficha::findOrFail($id)->update($request->all());
        return redirect("admin/ficha/$request->servicio_id/crear")->with('mensaje','Ficha actualizada con exito');
    }


    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) { 
            try {
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
}
