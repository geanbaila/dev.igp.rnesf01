<?php

namespace App\Policies;

use App\Business\Estacion\Sismica\EstacionSismica;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SismicaPolicy{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }

    public function create(User $user){
        return $user->hasAnyPermission(['stations_create']);
    }

    public function update(User $user, EstacionSismica $sismica){
        return ($user->id === $sismica->user_id) &&
            ( empty($sismica->lista) || (!empty($sismica->lista) && empty($sismica->lista->signed_file_path)) );
    }

    public function delete(User $user, EstacionSismica $sismica){
        return $user->id === $sismica->user_id;
    }

}
