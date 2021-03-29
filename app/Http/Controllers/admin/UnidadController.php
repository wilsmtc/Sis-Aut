<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Unidad;
use App\Http\Requests\ValidacionUnidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{

    public function index()
    {
        $datos = Unidad::orderBy('id')->get();
        return view('admin.unidad.index',compact('datos'));
    }

    public function create()
    {
        return view('admin.unidad.crear');
    }

    public function store(ValidacionUnidad $request)
    {
        Unidad::create($request->all());
        return redirect('admin/unidad')->with('mensaje','Unidad creada con exito');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $unidad = Unidad::findOrfail($id);
        //dd($unidad);
        return view('admin.unidad.editar', compact('unidad'));
    }

    public function update(ValidacionUnidad $request, $id)
    {
        Unidad::findOrFail($id)->update($request->all());
        return redirect('admin/unidad')->with('mensaje', 'Rol actualizado con exito');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) { 
            try {
                //Eliminar registro
                Unidad::destroy($id);
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
