<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Personal extends Model
{
    protected $table = "personal";
    protected $fillable=['nombre','apellido','ci','celular','fecha_ing','cargo_id','unidad_id','foto','genero','curriculum','estado','direccion'];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class); //muchos personales pertenecen a una unidad
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class); //muchos personales pertenecen a una unidad
    }

    public static function setFoto($foto, $actual = false) //foto (al crear), actual (al editar)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("datos/fotos/personal/$actual"); // si es actual borra la anterior
            }
            $imageName = Str::random(10) . '.jpg';  //STR para llamar a rando q crea un nombre aleatorio de 15 caracteres con la extension .jpg
            $imagen = Image::make($foto)->encode('jpg', 75); //codifica a jpg con un 75% de la imagen real
            $imagen->resize(500, 550, function ($constraint) { //redimensiona la imagen
                $constraint->upsize();
            });
            Storage::disk('public')->put("datos/fotos/personal/$imageName", $imagen->stream()); //guarda la imagen
            return $imageName; //retorna el nombre de la imagen
        } else {
            return false;
        }       
    }

    public static function setDocumento($documento, $actual = false) //documento (al crear), actual (al editar)
    {
        if ($documento) {
            if ($actual) {
                Storage::disk('public')->delete("datos/documentos/personal/$actual"); // si es actual borra la anterior
            }
            $docName = Str::random(10) . '.pdf';  //STR para llamar a rando q crea un nombre aleatorio de 15 caracteres con la extension .jpg
            //$doc = ->encode('pdf'); //codifica a jpg con un 75% de la imagen real
            
            //Storage::disk('public')->put("imagenes/documentos/personal/$docName", $documento); //guarda la imagen
            $documento->move(public_path().'/storage/datos/documentos/personal/', $docName);
            return $docName; //retorna el nombre de la imagen
        } else {
            return false;
        }        
    }
}
