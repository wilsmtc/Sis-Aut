<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteTable extends Migration
{

    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',50);
            $table->string('apellido_p',20);
            $table->string('apellido_m',20)->nullable();
            $table->string('ci',12)->unique();
            $table->string('direccion',60)->nullable();
            $table->string('celular',12)->nullable();
            $table->date('fecha_nac');
            $table->string('genero',6);
            $table->string('foto',20)->nullable();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paciente');
    }
}
