<?php

namespace App\Business\Estacion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fuente extends Model{

    use SoftDeletes;

    protected $table = 'fuentes';

}
