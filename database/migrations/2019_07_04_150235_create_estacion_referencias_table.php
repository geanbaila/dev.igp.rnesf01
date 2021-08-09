<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstacionReferenciasTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('estaciones_referencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero',15)->nullable();
            $table->unsignedInteger('finalizacion_id')->nullable();

            $table->boolean('doble_frecuencia');

            // Antena
            $table->string('ant_marca',140);
            $table->string('ant_modelo',140);
            $table->string('ant_serie',140)->nullable();
            $table->unsignedTinyInteger('ant_monumentacion');

            // Receptor
            $table->string('rec_marca',140);
            $table->string('rec_modelo',140);
            $table->string('rec_serie',140)->nullable();
            $table->string('rec_frec_muestreo_s1',140);
            $table->string('rec_frec_muestreo_s2',140);
            $table->string('rec_cap_almacenamiento',140);
            //$table->boolean('rec_ethernet');
            $table->boolean('rec_conf_web');
            $table->string('rec_formato_salida',140);
            //$table->text('rec_observaciones')->nullable();

            // General
            $table->string('fuente_220vac',15);
            // $table->boolean('fuente_12vdc');
            $table->unsignedInteger('dias_respaldo');
            $table->unsignedInteger('distrito_id');
            $table->decimal('latitud');
            $table->decimal('longitud');
            $table->integer('altitud');
            $table->text('rec_observaciones')->nullable();

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
        Schema::dropIfExists('estaciones_referencias');
    }
}
