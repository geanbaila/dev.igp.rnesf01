<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstacionSismicasTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('estaciones_sismicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero',15)->nullable();
            $table->unsignedInteger('finalizacion_id')->nullable();

            // Sensor
            $table->string('sensor_marca',140);
            $table->string('sensor_modelo',140);
            $table->string('sensor_serie',140)->nullable();
            $table->unsignedInteger('sensor_num_componentes');
            $table->text('sensor_observaciones')->nullable();

            // Registrador
            $table->string('reg_marca',140);
            $table->string('reg_modelo',140);
            $table->string('reg_serie',140)->nullable();
            $table->string('reg_frec_muestreo',140);
            $table->string('reg_cap_almacenamiento',140);
            $table->boolean('reg_ethernet');
            $table->boolean('reg_conf_web');
            $table->string('reg_formato_salida',140);
            $table->text('reg_observaciones')->nullable();

            // General
            $table->string('fuente_220vac',15);
            $table->unsignedInteger('dias_respaldo');
            $table->unsignedInteger('distrito_id');
            $table->decimal('latitud');
            $table->decimal('longitud');
            $table->integer('altitud');

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
        Schema::dropIfExists('estaciones_sismicas');
    }
}
