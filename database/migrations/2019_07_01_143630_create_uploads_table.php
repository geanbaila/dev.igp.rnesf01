<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadsTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('slug');
            $table->string('descripcion')->nullable();
            $table->unsignedTinyInteger('tipo')->nullable()->comment('sheet, photo, other');
            $table->string('ruta_real')->nullable();
            $table->string('ruta_relativa');
            $table->unsignedBigInteger('uploadable_id');
            $table->string('uploadable_type');

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
        Schema::dropIfExists('uploads');
    }
}
