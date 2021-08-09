<?php

namespace App\Business\Pais;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model{
    protected $table = 'distritos';

    public function provincia(){
        return $this->hasOne(Provincia::class,'id','provincia_id');
    }
}
