<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionPersonal;
use App\Models\Admin\Personal;
use App\Models\Admin\Unidad;
use Illuminate\Http\Request;

class PersonalController extends Controller
{

    public function index()
    {
        $datos= Personal::orderBy('id')->get();
        return view('admin.personal.index',compact('datos'));
    }

    public function create()
    {
        $unidad = Unidad::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('admin.personal.crear', compact('unidad'));
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
        $personal = Personal::with('unidad')->findOrFail($id);        
        return view('admin.personal.editar', compact('personal','unidad'));
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

    public function destroy($id)
    {
        //
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
}
