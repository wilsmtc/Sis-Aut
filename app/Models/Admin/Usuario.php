<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Usuario extends Authenticatable
{
    protected $remember_token = false;
    Protected $table = "usuarios";
    protected $fillable = ['rol_id','usuario','nombre','apellido','email','password','foto','estado'];

    public function rol()
    {
        return $this->belongsTo(Rol::class); //muchos usuarios pertenecen a un rol
    }
    public function setPasswordAttribute($pass) //esta funcion es de laravel para encriptar password
    {
        $this->attributes['password']=Hash::make($pass);
    }
    public static function setFoto($foto, $actual = false) //foto (al crear), actual (al editar)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("datos/fotos/usuario/$actual"); // si es actual borra la anterior
            }
            $imageName = Str::random(10) . '.jpg';  //STR para llamar a rando q crea un nombre aleatorio de 15 caracteres con la extension .jpg
            $imagen = Image::make($foto)->encode('jpg', 75); //codifica a jpg con un 75% de la imagen real
            $imagen->resize(500, 550, function ($constraint) { //redimensiona la imagen
                $constraint->upsize();
            });
            Storage::disk('public')->put("datos/fotos/usuario/$imageName", $imagen->stream()); //guarda la imagen
            return $imageName; //retorna el nombre de la imagen
        } else {
            return false;
        }
        
    }
    public function setSession($rol)
    {
            Session::put(
            [            
                'usuario'=> $this->usuario,
                'usuario_id' =>$this->id,
                'nombre_usuario'=>$this->nombre,
                'apellido_usuario'=>$this->apellido,
                'email_usuario'=>$this->email,
                'foto_usuario'=>$this->foto,
                'rol_usuario'=>$this->rol->rol,
                
            ]
            );
    }
}
