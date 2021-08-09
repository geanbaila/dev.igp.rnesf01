<?php

namespace App\Business\Estacion\Referencia;

use Illuminate\Foundation\Http\FormRequest;

class ReferenciasCreateRequest extends FormRequest{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'doble_frecuencia' => 'required|integer',
            'ant_marca' => 'required|min:2|max:140',
            'ant_modelo' => 'required|min:2|max:140',
            'ant_serie' => 'nullable|min:2|max:140',
            'ant_monumentacion' => 'required|integer',
            // 'ant_observaciones' => '',
            'rec_marca' => 'required|max:140',
            'rec_modelo' => 'required|max:140',
            'rec_serie' => 'nullable|min:2|max:140',
            'rec_frec_muestreo_s1' => 'required|integer|max:999999999',
            'rec_frec_muestreo_s2' => 'required|integer|max:999999999',
            // 'rec_ethernet' => 'required',
            'rec_conf_web' => 'required',
            'rec_formato_salida' => 'required|max:140',

            'dias_respaldo' => 'required|integer|max:365',
            'distrito_id' => 'required|integer',
            'latitud' => 'required|numeric|max:999999',
            'longitud' => 'required|numeric|max:999999',
            'altitud' => 'required|integer|max:999999999',

            'almacenamientos' => 'required',
            'fuentes' => 'required',

            'tipocomunicacion' => 'required',
            'estacion_nombre' =>'required|max:140',
        ];
    }

    public function attributes (){
        return array(
            'ant_marca' => '',
            'ant_modelo' => '',
            'ant_serie' => '',
            'ant_monumentacion' => '',
            'rec_marca' => '',
            'rec_modelo' => '',
            'rec_serie' => '',
            'rec_frec_muestreo_s1' => '',
            'rec_frec_muestreo_s2' => '',
            'rec_cap_almacenamiento' => '',
            'rec_conf_web' => '',
            'rec_formato_salida' => '',
            'fuente_220vac' => '',
            'fuente_12vdc' => '',
            'dias_respaldo' => '',
            'distrito_id' => '',
            'latitud' => '',
            'longitud' => '',
            'altitud' => '',
            'observaciones' => '',

            'almacenamientos' => '',
            'fuentes' => '',
        );
    }
}
