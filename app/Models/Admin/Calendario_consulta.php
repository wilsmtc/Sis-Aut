<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Calendario_consulta extends Model
{
    protected $table = "calendario_consulta";
    protected $fillable=['fecha','title','color','textColor','start','end','intervalo','num_consultas','horario'];
}
