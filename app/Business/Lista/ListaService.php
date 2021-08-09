<?php

namespace App\Business\Lista;

use App\Business\Estacion\Serie;

class ListaService {

    public function findPending($params = array()){
        $pending = Lista::firstOrCreate([
            'user_id' => $params['user_id'],
            'signed_file_path' => null,
            'fecha_firma' => null,
        ]);

        if (empty($pending->numero)){
            $serie = Serie::available($params['user_id'], Serie::LIST_TYPE);
            $pending->numero = $serie->full_number;
            $pending->update();
            $serie->next = ($serie->next+1);
            $serie->update();
        }

        return $pending;
    }

    public function findById($id){
        return Lista::where('id','=',$id)->withTrashed()->first();
    }

    public function findSentLists($params = array()){
        return Lista::where('user_id', '=' , $params['user_id'])
            ->whereNotNull('signed_file_path')->orderBy('numero','DESC');
    }

    public function findReceivedLists($filters = []){
        $user = key_exists('institution_filter', $filters)?$filters['institution_filter']: null;

        return Lista::whereNotNull('signed_file_path')
            ->whereNotNull('fecha_firma')
            ->when(!empty($user), function($when) use ($user){
                $when->where('user_id','=',$user);
            })
            ->orderBy('fecha_firma','DESC');
    }

}