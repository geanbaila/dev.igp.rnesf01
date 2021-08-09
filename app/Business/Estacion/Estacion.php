<?php


namespace App\Business\Estacion;

use Illuminate\Database\Eloquent\Model;

class Estacion extends Model{

    public function getAlmacenamientosInARow(){
        $string = '';
        foreach($this->almacenamientos as $storage){
            $string.=("{$storage->nombre}: {$storage->pivot->capacidad}GB, ");
        }
        return str_without_ending(trim($string),',');
    }

}