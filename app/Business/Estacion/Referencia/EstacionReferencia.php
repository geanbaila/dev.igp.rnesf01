<?php

namespace App\Business\Estacion\Referencia;

use App\Business\Estacion\Almacenamiento;
use App\Business\Estacion\TipoComunicacion;
use App\Business\Estacion\Estacion;
use App\Business\Estacion\Fuente;
use App\Business\Lista\Lista;
use App\Business\Pais\Distrito;
use App\Business\Upload\Upload;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstacionReferencia extends Estacion {

    use SoftDeletes;

    const MORPH_NAME = 'referencias';

    const TYPE = 3;

    protected $table = 'estaciones_referencias';

    protected $fillable = [
        'numero',
        'finalizacion_id',
        'doble_frecuencia',

        'ant_marca',
        'ant_modelo',
        'ant_serie',
        'ant_monumentacion',
        'rec_marca',
        'rec_modelo',
        'rec_serie',
        'rec_frec_muestreo_s1',
        'rec_frec_muestreo_s2',
        'rec_cap_almacenamiento',
        'rec_conf_web',
        'rec_formato_salida',
        'fuente_220vac',
        'fuente_12vdc',
        'dias_respaldo',
        'distrito_id',
        'latitud',
        'longitud',
        'altitud',
        'rec_observaciones',
        'user_id',
        'estacion_nombre',
        'estacion_codigo',
        'estacion_red',
    ];

    public function getTipoAttribute(){
        return 'Estación de referencia GNSS';
    }


    public function uploads(){
        return $this->morphMany(Upload::class, 'uploadable')->orderBy('tipo');
    }

    public function GetMonumentacionTextAttribute(){
        if ($this->ant_monumentacion == '1') return 'Tipo Trípode';
        if ($this->ant_monumentacion == '2') return 'Pilar';
        if ($this->ant_monumentacion == '3') return 'Otros';
    }

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();;
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
