<?php


namespace App\Business\Estacion\Sismica;


class SismicasService {

    public function save($data){
        $data['user_id'] = auth()->user()->id;
        $sismica = new EstacionSismica();
        $sismica->fill($data);
        $sismica->save();
        return $sismica;
    }

    public function update($id, $data){
        if (is_a($id, EstacionSismica::class)) $sismica = $id;
        else $sismica = EstacionSismica::findOrFail($id);

        $sismica->fill($data);
        if($sismica->isDirty()){
            $sismica->update();
        }
        return $sismica;
    }

    public function findById($id){
        return EstacionSismica::withTrashed()->where('id','=',$id)->first();
    }

    public function findByIds($ids){
        return EstacionSismica::whereIn('id',$ids);
    }

    public function findAll($filters = array()){
        $user_id = key_exists('stations_filter_institution', $filters)?$filters['stations_filter_institution']:null;
        $capacity = key_exists('stations_filter_capacity', $filters)?$filters['stations_filter_capacity']:null;
        $ethernet = key_exists('stations_filter_ethernet', $filters)?$filters['stations_filter_ethernet']:null;
        $confweb = key_exists('stations_filter_confweb', $filters)?$filters['stations_filter_confweb']:null;

        $ids_in = key_exists('stations_filter_ids_in', $filters)?$filters['stations_filter_ids_in']:null;
        $signed_file_path = key_exists('signed_file_path', $filters)?$filters['signed_file_path']:null;

        return EstacionSismica::query()
            ->select('*',
                \DB::raw('(case when isnull(lista_id) then 3 when (select isnull(signed_file_path) from listas where id = lista_id)= 1 then 1 else 2 end) as signed_file_path')
            )
            ->when(!empty($user_id), function ($when) use ($user_id){  // user
                $when->where('user_id','=', $user_id);
            })
            ->when(!empty($capacity), function ($when) use ($capacity){  // capacity
                $when->where('reg_cap_almacenamiento','LIKE', '%'.$capacity.'%');
            })
            ->when(($ethernet == '0' || $ethernet == '1'), function ($when) use ($ethernet){  // ethernet
                $when->where('reg_ethernet','=', $ethernet);
            })
            ->when(($confweb == '0' || $confweb == '1'), function ($when) use ($confweb){  // year
                $when->where('reg_conf_web','=', $confweb);
            })
            ->when((!empty($ids_in) && count($ids_in) > 0), function ($when) use ($ids_in){  // year
                $when->whereIn('id', $ids_in);
            })
            ->when((isset($signed_file_path)), function ($when) use ($signed_file_path){
                $when->where(\DB::raw('(case when isnull(lista_id) then 3 when (select isnull(signed_file_path) from listas where id = lista_id)= 1 then 1 else 2 end )'),'=', $signed_file_path);
            })
            ->orderBy('user_id', 'desc')
            ->orderBy('created_at', 'desc');
    }

    public function findForFormats($params = array()){
        $user_id = key_exists('institution_id', $params)?$params['institution_id']:null;
        return EstacionSismica::query()
            ->when(!empty($user_id), function ($when) use ($user_id){  // user
                $when->where('user_id','=', $user_id);
            })->orderBy('numero')->get();
    }


}