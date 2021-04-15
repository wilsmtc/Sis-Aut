<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $table = "ficha";
    protected $fillable=['paciente_id','servicio_id','fecha','hora','estado'];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class); //muchos personales pertenecen a una unidad
    }
    public function paciente()
    {
        return $this->belongsTo(Paciente::class); //un paciente tiene mucha s fichas
    }
}
