<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionPersonal;
use App\Models\Admin\Cargo;
use App\Models\Admin\Personal;
use App\Models\Admin\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{

    public function index()
    {
        $datos= Personal::where('estado',1)->orderBy('id')->get();
        return view('admin.personal.index',compact('datos'));
    }

    public function create()
    {
        $unidad = Unidad::orderBy('id')->pluck('nombre', 'id');
        $cargo = Cargo::orderBy('id')->pluck('nombre', 'id');
        return view('admin.personal.crear', compact('unidad','cargo'));
    }

    public function store(ValidacionPersonal $request)
    {
        if($foto=Personal::setFoto($request->foto_up))
            $request->request->add(['foto'=>$foto]);
        if($documento=Personal::setDocumento($request->documento_up))
            $request->request->add(['curriculum'=>$documento]);
        //dd($request->all());
        Personal::create($request->all());
        //llamar a crear usuario, y llenarlo con datos
        return redirect('admin/personal')->with('mensaje','Personal creado con exito');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $unidad = Unidad::orderBy('id')->pluck('nombre', 'id')->toArray();
        $cargo = Cargo::orderBy('id')->pluck('nombre', 'id')->toArray();
        $personal = Personal::with('unidad')->findOrFail($id);        
        return view('admin.personal.editar', compact('personal','unidad','cargo'));
    }

    public function update(ValidacionPersonal $request, $id)
    {
        $personal = Personal::findOrFail($id);
        if ($foto = Personal::setFoto($request->foto_up, $personal->foto))
            $request->request->add(['foto' => $foto]);
        if ($documento = Personal::setDocumento($request->documento_up, $personal->curriculum))
            $request->request->add(['curriculum' => $documento]);
        $personal->update($request->all());
        return redirect('admin/personal')->with('mensaje', 'Datos actualizados con exito');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $usuario=Personal::findOrFail($id);
            if (Personal::destroy($id)) {
                Storage::disk('public')->delete("datos/fotos/personal/$usuario->foto");
                Storage::disk('public')->delete("datos/documentos/personal/$usuario->foto");
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
                abort(404);
        } 
    }

    public function pdf($id)
    {
        $personal = Personal::findOrFail($id);
        $file= public_path().'\storage\datos\documentos\personal/'.$personal->curriculum;
        return response()->file($file);
    }
    public function ver(Personal $personal)
    {
        return view ('admin.personal.foto', compact('personal'));
        //dd($usuario);
    }
    public function inactivar(Request $request, $id)
    {
        if ($request->ajax()) { 
            try {
                $request->request->add(['estado' => 0]);
                Personal::findOrFail($id)->update($request->all());
                $aux=1;
            } catch (\Illuminate\Database\QueryException $e) {
                $aux=0;
            }          
            if ($aux==1) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        } 
    }
    public function activar(Request $request, $id)
    {
        if ($request->ajax()) { 
            try {
                $request->request->add(['estado' => 1]);
                Personal::findOrFail($id)->update($request->all());
                $aux=1;
            } catch (\Illuminate\Database\QueryException $e) {
                $aux=0;
            }          
            if ($aux==1) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        } 
    }
    public function index_inactivo()
    {
        $datos = Personal::where('estado',0)->orderBy('id')->get();
        return view('admin.personal.inactivo', compact('datos'));
        
    }
}
