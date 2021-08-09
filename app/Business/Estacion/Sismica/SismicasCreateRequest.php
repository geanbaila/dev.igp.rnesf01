<?php

namespace App\Business\Estacion\Sismica;

use Illuminate\Foundation\Http\FormRequest;

class SismicasCreateRequest extends FormRequest{
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
            'sensor_marca' => 'required|min:2|max:140',
            'sensor_modelo' => 'required|min:2|max:140',
            'sensor_serie' => 'nullable|min:2|max:140',
            'sensor_num_componentes' => 'required|integer|max:100',
            // 'sensor_observaciones' => '',
            'reg_marca' => 'required|max:140',
            'reg_modelo' => 'required|max:140',
            'reg_serie' => 'nullable|min:2|max:140',
            'reg_frec_muestreo' => 'required|integer|max:999999999',
            // 'reg_cap_almacenamiento' => 'required|numeric',
            'reg_ethernet' => 'required',
            'reg_conf_web' => 'required',
            'reg_formato_salida' => 'required|max:140',
            // 'reg_observaciones' => '',
            //'fuente_220vac' => 'required',
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
            'sensor_marca' => '',
            'sensor_modelo' => '',
            'sensor_serie' => '',
            'sensor_num_componentes' => '',
            'sensor_observaciones' => '',
            'reg_marca' => '',
            'reg_modelo' => '',
            'reg_serie' => '',
            'reg_frec_muestreo' => '',
            'reg_cap_almacenamiento' => '',
            'reg_ethernet' => '',
            'reg_conf_web' => '',
            'reg_formato_salida' => '',
            'reg_observaciones' => '',
            'fuente_220vac' => '',
            'dias_respaldo' => '',
            'distrito_id' => '',
            'latitud' => '',
            'longitud' => '',
            'altitud' => '',
            'almacenamientos' => '',
        );
    }
}
