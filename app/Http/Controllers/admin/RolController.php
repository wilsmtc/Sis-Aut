<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionRol;
use App\Models\Admin\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{

    public function index()
    {
        $datos = Rol::orderBy('id')->get();
        return view('admin.roles.index', compact('datos'));
    }

    public function create()
    {
        return view('admin.roles.crear');
    }

    public function store(ValidacionRol $request)
    {
        
        if($request->añadir == "on" )
            $request->request->add(['añadir' => 1]);
        else
            $request->request->add(['añadir' => 0]);
        if($request->editar == "on")
            $request->request->add(['editar' => 1]);   
        else
            $request->request->add(['editar' => 0]); 
        if($request->eliminar == "on")
            $request->request->add(['eliminar' => 1]);   
        else
            $request->request->add(['eliminar' => 0]);
        //dd($request->all());    
        Rol::create($request->all());
        return redirect('admin/rol')->with('mensaje', 'Rol creado correctamente');        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Rol::findOrfail($id);
        return view('admin.roles.editar', compact('data'));
    }

    public function update(ValidacionRol $request, $id)
    {
        if($id==1){
            return redirect('admin/rol')->with('mensajeerror', 'no puedes editar el rol de Administrador');
        }
        else{
            if($request->añadir == "on" )
                $request->request->add(['añadir' => 1]);
            else
                $request->request->add(['añadir' => 0]);
            if($request->editar == "on")
                $request->request->add(['editar' => 1]);   
            else
                $request->request->add(['editar' => 0]); 
            if($request->eliminar == "on")
                $request->request->add(['eliminar' => 1]);   
            else
                $request->request->add(['eliminar' => 0]);
            //dd($request->all());
            Rol::findOrFail($id)->update($request->all());
            return redirect('admin/rol')->with('mensaje', 'Rol actualizado con exito');
        }
    }

    public function destroy(Request $request, $id)
    {
        $aux=3; 
        if ($request->ajax()) { 
            if($id!=1){//solo va entrar cuando no es admin
                try {
                    //Eliminar registro
                    Rol::destroy($id);
                    $aux=1;
                } catch (\Illuminate\Database\QueryException $e) {
                    $aux=2;
                } 
            }  
                            
            if ($aux==1) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                if($aux==2){
                    return response()->json(['mensaje' => 'ng']);
                }
                else{
                    return response()->json(['mensaje' => 'admin']);
                }
            }
        } else {
            abort(404);
        } 
    }
}
