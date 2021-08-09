<?php


namespace App\Business\Pais;


class PaisService{

    public function findAllDistricts(){
        return Distrito::with(['provincia.departamento'])->get();
    }

}