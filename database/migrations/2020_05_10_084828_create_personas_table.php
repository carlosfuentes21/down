<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('personas',  function (Blueprint $table) {

            $table->Increments('id');
            $table->string('documento',10);
            $table->unique('documento');
            $table->string('nombre',45);
            $table->string('apellido',45);
            $table->date('fechaNac');
            $table->string('sexo',10);
            $table->string('telefono',21);
            $table->string('foto',200);
            $table->unsignedInteger('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('restrict');
            $table->timestamps();
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
