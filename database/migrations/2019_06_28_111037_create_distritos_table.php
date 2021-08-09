<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistritosTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('distritos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_ubigeo',3)->nullable();
            $table->string('ubigeo',9)->nullable();
            $table->string('nombre',50);
            $table->unsignedInteger('provincia_id');
            $table->foreign('provincia_id')->references('id')->on('provincias');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('distritos');
    }
}
