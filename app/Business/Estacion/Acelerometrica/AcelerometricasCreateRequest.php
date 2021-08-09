<?php

namespace App\Business\Estacion\Acelerometrica;

use Illuminate\Foundation\Http\FormRequest;

class AcelerometricasCreateRequest extends FormRequest{
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
            'marca' => 'required|max:140',
            'modelo' => 'required|max:140',
            'serie' => 'nullable|min:2|max:140',
            'frec_muestreo' => 'required|integer|max:999999999',
            'ethernet' => 'required',
            'conf_web' => 'required',
            'formato_salida' => 'required|max:140',
            'dias_respaldo' => 'required|integer|max:365',
            'distrito_id' => 'required|integer',
            'latitud' => 'required|numeric|max:999999',
            'longitud' => 'required|numeric|max:999999',
            'altitud' => 'required|integer|max:999999999',
            'observaciones' => '',

            'almacenamientos' => 'required',
            'fuentes' => 'required',

            'tipocomunicacion' => 'required',
            'estacion_nombre' =>'required|max:140',
        ];
    }

    public function attributes (){
        return array(
            'marca' => '',
            'modelo' => '',
            'serie' => '',
            'frec_muestreo' => '',
            'cap_almacenamiento' => '',
            'ethernet' => '',
            'conf_web' => '',
            'formato_salida' => '',
            'observaciones' => '',
            'fuente_220vac' => '',
            'dias_respaldo' => '',
            'distrito_id' => '',
            'latitud' => '',
            'longitud' => '',
            'altitud' => '',

            'almacenamientos' => '',
            'fuentes' => '',
 
        );
    }
}
