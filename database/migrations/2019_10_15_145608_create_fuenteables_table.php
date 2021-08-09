<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuenteablesTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('fuenteables', function (Blueprint $table) {
            $table->unsignedBigInteger('fuente_id')->comment('Fuente Id');
            $table->unsignedBigInteger('fuenteable_id')->comment('Estacion Id');
            $table->string('fuenteable_type')->comment('Tipo estacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('fuenteables');
    }
}
