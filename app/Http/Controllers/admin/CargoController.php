<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionCargo;
use App\Models\Admin\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{

    public function index()
    {
        $datos = Cargo::orderBy('id')->get();
        return view('admin.cargo.index',compact('datos'));
    }

    public function create()
    {
        return view('admin.cargo.crear');
    }

    public function store(ValidacionCargo $request)
    {
        Cargo::create($request->all());
        return redirect('admin/cargo')->with('mensaje','Cargo creado con exito');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $cargo = Cargo::findOrfail($id);
        //dd($unidad);
        return view('admin.cargo.editar', compact('cargo'));
    }

    public function update(ValidacionCargo $request, $id)
    {
        Cargo::findOrFail($id)->update($request->all());
        return redirect('admin/cargo')->with('mensaje', 'Cargo actualizado con exito');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) { 
            try {
                //Eliminar registro
                Cargo::destroy($id);
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
