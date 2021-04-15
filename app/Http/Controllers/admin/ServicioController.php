<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionServicio;
use App\Models\Admin\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $datos = Servicio::orderBy('id')->get();
        return view('admin.servicio.index',compact('datos'));
    }

    public function create()
    {
        return view('admin.servicio.crear');
    }

    public function store(ValidacionServicio $request)
    {
        if($foto=Servicio::setFoto($request->foto_up))
            $request->request->add(['foto'=>$foto]);
        Servicio::create($request->all());
        return redirect('admin/servicio')->with('mensaje','Servicio creado con exito');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrfail($id);
        //dd($unidad);
        return view('admin.servicio.editar', compact('servicio'));
    }

    public function update(ValidacionServicio $request, $id)
    {
        $servicio=Servicio::findOrFail($id);
        if ($foto = Servicio::setFoto($request->foto_up, $servicio->foto))
            $request->request->add(['foto' => $foto]);
        $servicio->update($request->all());
        return redirect('admin/servicio')->with('mensaje', 'Servicio actualizado con exito');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) { 
            try {
                //Eliminar registro
                Servicio::destroy($id);
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
