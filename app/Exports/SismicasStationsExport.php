<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SismicasStationsExport implements FromCollection, WithHeadings {

    private $stations;

    /**
     * SismicasStationsExport constructor.
     * @param $stations
     */
    public function __construct($stations){
        $this->stations = $stations;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
        $collect = collect();
        foreach ($this->stations as $station){
            $row = [
                'NUMERO' => $station->numero,
                'SENSOR_MARCA' => $station->sensor_marca,
                'SENSOR_MODELO' => $station->sensor_modelo,
                'SENSOR_SERIE' => $station->sensor_serie,
                'SENSOR_NUM_COMPONENTES' => $station->sensor_num_componentes,
                'SENSOR_OBSERVACIONES' => $station->sensor_observaciones,
                'REGISTRADOR_MARCA' => $station->reg_marca,
                'REGISTRADOR_MODELO' => $station->reg_modelo,
                'REGISTRADOR_SERIE' => $station->reg_serie,
                'REGISTRADOR_FREC_MUESTREO' => $station->reg_frec_muestreo.'Hz',
                'ALMACENAMIENTO' => $station->getAlmacenamientosInARow(),
                'REGISTRADOR_ETHERNET' => ($station->reg_ethernet == 1)?'Sí':'No',
                'REGISTRADOR_INTERFAZ_WEB' => ($station->reg_conf_web == 1)?'Sí':'No',
                'REGISTRADOR_FORMATO_SALIDA' => $station->reg_formato_salida,
                'REGISTRADOR_OBSERVACIONES' => $station->reg_observaciones,
                'VOLTAJE' => $station->fuentes->implode('voltaje',', '),
                'DIAS_RESPALDO_ENERGIA' => $station->dias_respaldo,
                'DISTRITO' => !empty($station->distrito)?$station->distrito->nombre:'',
                'PROVINCIA' => !empty($station->distrito)?$station->distrito->provincia->nombre:'',
                'DEPARTAMENTO' => !empty($station->distrito)?$station->distrito->provincia->departamento->nombre:'',
                'LATITUD' => $station->latitud.'°',
                'LONGITUD' => $station->longitud.'°',
                'ALTITUD' => $station->altitud.'m',
                'N_HOJAS_CALIBRACION' => (($station->file_counter)['sheets'])->count(),
                'N_FOTOS' => (($station->file_counter)['photos'])->count(),
                'N_OTROS_ARCHIVOS' => (($station->file_counter)['others'])->count(),
            ];
            $collect->push($row);
        }
        return $collect;
    }

    public function headings(): array{
        return [
            'NUMERO',
            'SENSOR_MARCA',
            'SENSOR_MODELO',
            'SENSOR_SERIE',
            'SENSOR_NUM_COMPONENTES',
            'SENSOR_OBSERVACIONES',
            'REGISTRADOR_MARCA',
            'REGISTRADOR_MODELO',
            'REGISTRADOR_SERIE',
            'REGISTRADOR_FREC_MUESTREO',
            'ALMACENAMIENTO',
            'REGISTRADOR_ETHERNET',
            'REGISTRADOR_INTERFAZ_WEB',
            'REGISTRADOR_FORMATO_SALIDA',
            'REGISTRADOR_OBSERVACIONES',
            'VOLTAJE',
            'DIAS_RESPALDO_ENERGIA',
            'DISTRITO',
            'PROVINCIA',
            'DEPARTAMENTO',
            'LATITUD',
            'LONGITUD',
            'ALTITUD',
            'N_HOJAS_CALIBRACION',
            'N_FOTOS',
            'N_OTROS_ARCHIVOS',
        ];
    }
}
