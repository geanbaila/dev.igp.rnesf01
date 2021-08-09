<?php

namespace App\Business\Estacion;

use App\Business\Estacion\Acelerometrica\EstacionAcelerometrica;
use App\Business\Estacion\Referencia\EstacionReferencia;
use App\Business\Estacion\Sismica\EstacionSismica;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model{

    const SISMICAS_TYPE = 1;
    const ACELEROMETRICAS_TYPE = 2;
    const REFERENCIAS_TYPE = 3;

    const LIST_TYPE = 10;
    const FORM_TYPE = 11;

    protected $fillable = [
        'user_id',
        'tipo_serie',
        'next',
    ];

    public static function available($user_id, $serie_type){
        $serie = Serie::firstOrCreate([
            'user_id' => $user_id,
            'tipo_serie' => $serie_type
        ]);
        return $serie->refresh();
    }

    public function getFullNumberAttribute(){
        $user = auth()->user();
        $letter = '';
        if ($this->tipo_serie == Serie::SISMICAS_TYPE || $this->tipo_serie == Serie::ACELEROMETRICAS_TYPE
            || $this->tipo_serie == Serie::REFERENCIAS_TYPE){
            switch ($this->tipo_serie){
                case EstacionSismica::TYPE:
                    $letter = '-ES-'.$user->sigla; break;
                case EstacionAcelerometrica::TYPE:
                    $letter = '-EA-'.$user->sigla; break;
                case EstacionReferencia::TYPE:
                    $letter = '-ER-'.$user->sigla; break;
            }
            return mb_strtoupper(str_pad($this->next,3,'0',STR_PAD_LEFT).$letter, 'UTF-8');
        }elseif ($this->tipo_serie == Serie::LIST_TYPE){
            $pre = 'L';
            return mb_strtoupper($pre.str_pad($this->next,4,'0',STR_PAD_LEFT), 'UTF-8');
        }
    }

    public static function getFormNextSerie(){
        // obtener el más alto número
        $last = 1;
        return  ($last+1);
    }

}
