<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionClinica;
use App\Models\Admin\Clinica;
use Illuminate\Http\Request;

class clinicaController extends Controller
{
    public function index()
    {
        $datos = Clinica::findOrfail(1);
        return view('admin.clinica.index',compact('datos'));
    }

    public function edit($id)
    {
        $clinica = Clinica::findOrFail($id);
        //dd($unidad);
        return view('admin.clinica.editar', compact('clinica'));
    }


    public function update(ValidacionClinica $request, $id)
    {
        $clinica = Clinica::findOrFail($id);
        if ($foto = Clinica::setFoto($request->foto_up, $clinica->foto))
            $request->request->add(['foto' => $foto]);
        if ($logo = Clinica::setLogo($request->logo_up, $clinica->logo))
            $request->request->add(['logo' => $logo]);
        $clinica->update($request->all());
        return redirect('admin/clinica')->with('mensaje', 'Datos actualizados con exito');
    }
}
