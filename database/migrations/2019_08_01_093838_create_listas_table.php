<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListasTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('listas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero')->nullable();
            $table->string('signed_file_path')->nullable();
            $table->dateTime('fecha_firma')->nullable();

            $table->unsignedInteger('user_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('listas');
    }
}
