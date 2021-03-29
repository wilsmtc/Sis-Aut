<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = "unidades";
    protected $fillable=['nombre','sigla','descripcion'];
}
