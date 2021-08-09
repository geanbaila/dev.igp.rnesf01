<?php

namespace App\Business\Estacion\Sismica;

use App\Business\Estacion\Almacenamiento;
use App\Business\Estacion\TipoComunicacion;
use App\Business\Estacion\Estacion;
use App\Business\Estacion\Fuente;
use App\Business\Lista\Lista;
use App\Business\Pais\Distrito;
use App\Business\Upload\Upload;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstacionSismica extends Estacion {

    use SoftDeletes;

    protected $table = 'estaciones_sismicas';

    const MORPH_NAME = 'sismicas';

    const TYPE = 1;

    const SESSION_PREVIOUS_KEY = 'previous_sismicas';

    protected $fillable = [
        'numero',
        'finalizacion_id',
        'sensor_marca',
        'sensor_modelo',
        'sensor_serie',
        'sensor_num_componentes',
        'sensor_observaciones',
        'reg_marca',
        'reg_modelo',
        'reg_serie',
        'reg_frec_muestreo',
        'reg_cap_almacenamiento',
        'reg_ethernet',
        'reg_conf_web',
        'reg_formato_salida',
        'reg_observaciones',
        'fuente_220vac',
        'dias_respaldo',
        'distrito_id',
        'latitud',
        'longitud',
        'altitud',
        'user_id',
        'estacion_nombre',
        'estacion_codigo',
        'estacion_red'
    ];

    public function getTipoAttribute(){
        return 'Estación sísmica digital';
    }

    public function uploads(){
        return $this->morphMany(Upload::class, 'uploadable')->orderBy('tipo');
    }

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function distrito(){
        return $this->belongsTo(Distrito::class);
    }

    public function lista(){
        return $this->belongsTo(Lista::class);
    }

    public function almacenamientos(){
        return $this->morphToMany(Almacenamiento::class, 'almacenable')->withPivot('capacidad');
    }

    public function fuentes(){
        return $this->morphToMany(Fuente::class, 'fuenteable');
    }

    public function setLatitudAttribute($latitud){
        if(!empty($latitud))
            $this->attributes['latitud'] = abs($latitud)*(-1);
    }

    public function setLongitudAttribute($longitud){
        if(!empty($longitud))
            $this->attributes['longitud'] = abs($longitud)*(-1);
    }

    public function getFileCounterAttribute(){
        $uploads = $this->uploads;

        $counter = array();
        $counter['sheets'] = collect();
        $counter['photos'] = collect();
        $counter['others'] = collect();

        if($uploads->count() > 0){
            $counter['sheets'] = $uploads->filter(function ($item){return $item->tipo == Upload::SHEET_TYPE;});
            $counter['photos'] = $uploads->filter(function ($item){return $item->tipo == Upload::PHOTO_TYPE;});
            $counter['others'] = $uploads->filter(function ($item){return $item->tipo == Upload::OTHER_FILES_TYPE;});
        }

        return $counter ;
    }

    public function tipocomunicacion(){
        return $this->morphToMany(TipoComunicacion::class, 'tipocomunicacionable')->withPivot('descripcion');
    }

}
