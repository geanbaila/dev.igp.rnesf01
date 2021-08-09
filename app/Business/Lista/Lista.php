<?php

namespace App\Business\Lista;

use App\Business\Estacion\Acelerometrica\EstacionAcelerometrica;
use App\Business\Estacion\Referencia\EstacionReferencia;
use App\Business\Estacion\Sismica\EstacionSismica;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lista extends Model{

    use SoftDeletes;

    protected $table = 'listas';

    protected $dates = [
        'fecha_firma',
    ];

    protected $fillable = [
        'numero',
        'signed_file_path',
        'fecha_firma',
        'user_id',
    ];

    public function sismicas(){
        return $this->hasMany(EstacionSismica::class);
    }

    public function acelerometricas(){
        return $this->hasMany(EstacionAcelerometrica::class);
    }

    public function referencias(){
        return $this->hasMany(EstacionReferencia::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
