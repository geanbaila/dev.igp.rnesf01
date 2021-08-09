<?php

namespace App\Business\Pais;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model{
    protected $table = 'provincias';

    public function departamento(){
        return $this->hasOne(Departamento::class,'id','departamento_id');
    }
}
