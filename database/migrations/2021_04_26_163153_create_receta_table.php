<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetaTable extends Migration
{
    public function up()
    {
        Schema::create('receta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consulta')->onDelete('restrict');
            $table->text('receta');
            $table->text('indicacion')->nullable();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('receta');
    }
}
