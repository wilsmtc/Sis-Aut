<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionUsuario;
use App\Models\Admin\Personal;
use App\Models\Admin\Rol;
use App\Models\Admin\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{

    public function index()
    {
        $datos = Usuario::where('estado',1)->orderBy('id')->get();
        return view('admin.usuarios.index', compact('datos'));
        
    }

    public function create()
    {
        $roles = Rol::orderBy('id')->pluck('rol', 'id')->toArray();
        return view('admin.usuarios.crear', compact('roles'));
    }

    public function store(ValidacionUsuario $request)
    {
        if($foto=Usuario::setFoto($request->foto_up))
            $request->request->add(['foto'=>$foto]);
        //dd($request->all());
        Usuario::create($request->all());
        return redirect('admin/usuario')->with('mensaje','Usuario creado con exito');
    }

    public function ver(Usuario $usuario)
    {
        return view ('admin.usuarios.foto', compact('usuario'));
        //dd($usuario);
    }

    public function edit($id) //en el index donde hay varios usuarios
    {
        $usuario = Usuario::findOrfail($id);
        $roles = Rol::orderBy('id')->pluck('rol', 'id')->toArray();
        $mi_usuario=null;
        return view('admin.usuarios.editar', compact('usuario','roles','mi_usuario'));        
    }

    public function update(ValidacionUsuario $request, $id)  //actualizar el cualquier usuario 
    {
        //dd($request->all());
        $usuario=Usuario::findOrFail($id);
        $usuario->update(array_filter($request->all()));
        return redirect('admin/usuario')->with('mensaje', 'Usuario actualizado con exito');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $usuario=Usuario::findOrFail($id);
                   
            if (Usuario::destroy($id)) {
                Storage::disk('public')->delete("datos/fotos/usuario/$usuario->foto");
                if($usuario->personal_id!=null){
                    $personal=Personal::findOrFail($usuario->personal_id);
                    $personal->update(['sistema'=>'no']);    
                } 
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
                abort(404);
        } 
    }
    public function inactivar(Request $request, $id)
    {
        if ($request->ajax()) { 
            try {
                $request->request->add(['estado' => 0]);
                Usuario::findOrFail($id)->update($request->all());
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
                Usuario::findOrFail($id)->update($request->all());
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
        $datos = Usuario::where('estado',0)->orderBy('id')->get();
        return view('admin.usuarios.inactivos', compact('datos'));
        
    }

    public function edit_user($id)
    {
        if($id==Auth::user()->id){
            $usuario = Usuario::findOrfail($id);
            $mi_usuario=1;
            return view('admin.usuarios.editar', compact('usuario','mi_usuario'));    
        }
        else{
            return back();
        }     
    }
    public function update_user(ValidacionUsuario $request, $id)
    {
        $usuario=Usuario::findOrFail($id);
        if ($foto = Usuario::setFoto($request->foto_up, $usuario->foto))
            $request->request->add(['foto' => $foto]);
        $usuario->update(array_filter($request->all()));
        $rol = $usuario->rol()->get();
        $usuario->setSession($rol);
        return redirect('admin')->with('mensaje', 'Usuario actualizado con exito');    
    }

    public function aceptar($id)
    {
        $usuario=Usuario::findOrFail($id);
        $usuario->update([
            'estado'=>1        
        ]);
        return redirect('admin/usuario')->with('mensaje', 'Usuario agregado con exito');    

    }
    public function rechazar($id)
    {
        $usuario=Usuario::findOrFail($id);
        Usuario::destroy($id);
        $personal=Personal::findOrFail($usuario->personal_id);
        $personal->update(['sistema'=>'no']);
        return back()->with('mensajeerror', 'Usuario rechazado');
    }

}
