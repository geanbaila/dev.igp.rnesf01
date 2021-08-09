<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlmacenablesTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('almacenables', function (Blueprint $table) {
            $table->unsignedBigInteger('almacenamiento_id')->comment('Almacenamiento');
            $table->unsignedBigInteger('almacenable_id')->comment('Estacion Id');
            $table->string('almacenable_type')->comment('Tipo estacion');
            $table->decimal('capacidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('almacenables');
    }
}
