<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AcelerometricasStationsExport implements FromCollection, WithHeadings{

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
                'MARCA' => $station->marca,
                'MODELO' => $station->modelo,
                'SERIE' => $station->serie,
                'FREC_MUESTREO' => $station->frec_muestreo.'Hz',
                'ALMACENAMIENTO' => $station->getAlmacenamientosInARow(),
                'ETHERNET' => ($station->ethernet == 1)?'Sí':'No',
                'INTERFAZ_WEB' => ($station->conf_web == 1)?'Sí':'No',
                'FORMATO_SALIDA' => $station->formato_salida,
                'FUENTE_ALIMENTACION' => $station->fuentes->implode('voltaje',', '),
                'DIAS_RESPALDO_ENERGIA' => $station->dias_respaldo,
                'DISTRITO' => !empty($station->distrito)?$station->distrito->nombre:'',
                'PROVINCIA' => !empty($station->distrito)?$station->distrito->provincia->nombre:'',
                'DEPARTAMENTO' => !empty($station->distrito)?$station->distrito->provincia->departamento->nombre:'',
                'LATITUD' => $station->latitud.'°',
                'LONGITUD' => $station->longitud.'°',
                'ALTITUD' => $station->altitud.'m',
                'OBSERVACIONES' => $station->observaciones,
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
            'MARCA',
            'MODELO',
            'SERIE',
            'FREC_MUESTREO',
            'ALMACENAMIENTO',
            'ETHERNET',
            'INTERFAZ_WEB',
            'FORMATO_SALIDA',
            'FUENTE_ALIMENTACION',
            'DIAS_RESPALDO_ENERGIA',
            'DISTRITO',
            'PROVINCIA',
            'DEPARTAMENTO',
            'LATITUD',
            'LONGITUD',
            'ALTITUD',
            'OBSERVACIONES',
            'N_HOJAS_CALIBRACION',
            'N_FOTOS',
            'N_OTROS_ARCHIVOS',
        ];
    }
}
