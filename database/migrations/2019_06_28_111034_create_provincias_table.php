<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinciasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('provincias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_ubigeo',3)->nullable();
            $table->string('ubigeo',9)->nullable();
            $table->string('nombre',30);
            $table->unsignedInteger('departamento_id');
            $table->foreign('departamento_id')->references('id')->on('departamentos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('provincias');
    }
}
