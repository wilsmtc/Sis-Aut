<?php

namespace App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;

class Internacion extends Model
{
    protected $table = "internacion";
    protected $fillable=['consulta_id','paciente_id','cama','fecha_ingreso','contacto_emergencia','motivo_i','e_fisico','craneo_cara','cuello_tiroides','torax','genitales','columna','e_neurologico','impresion_d','conducta','fecha_salida','diagnostico_salida','tratamiento_realizado','nombre_resp','ci_resp','testigo','foto_evolucion','estado'];
    
    public function paciente()
    {
        return $this->belongsTo(Paciente::class); //un paciente tiene mucha s internaciones
    }

    public static function setFoto($foto, $actual = false) //foto (al crear), actual (al editar)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("datos/fotos/internacion/$actual"); // si es actual borra la anterior
            }
            $imageName = Str::random(7) . '.jpg';  //STR para llamar a rando q crea un nombre aleatorio de 15 caracteres con la extension .jpg
            $imagen = Image::make($foto)->encode('jpg', 100); //codifica a jpg con un 75% de la imagen real
            $imagen->resize(700, 500, function ($constraint) { //redimensiona la imagen
                $constraint->upsize();
            });
            Storage::disk('public')->put("datos/fotos/internacion/$imageName", $imagen->stream()); //guarda la imagen
            return $imageName; //retorna el nombre de la imagen
        } else {
            return false;
        }       
    }
}
