<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstacionAcelerometricasTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('estaciones_acelerometricas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('numero',15)->nullable();
            $table->unsignedInteger('finalizacion_id')->nullable();

            $table->string('marca',140);
            $table->string('modelo',140);
            $table->string('serie',140)->nullable();
            $table->string('frec_muestreo',140);
            $table->string('cap_almacenamiento',140);
            $table->boolean('ethernet');
            $table->boolean('conf_web');
            $table->string('formato_salida',140);

            $table->string('fuente_220vac', 15);
            $table->unsignedInteger('dias_respaldo');
            $table->unsignedInteger('distrito_id');
            $table->decimal('latitud');
            $table->decimal('longitud');
            $table->integer('altitud');

            $table->text('reg_observaciones')->nullable();

            $table->unsignedInteger('lista_id')->nullable();

            // Audit
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
        Schema::dropIfExists('estaciones_acelerometricas');
    }
}
