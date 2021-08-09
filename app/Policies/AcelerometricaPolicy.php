<?php

namespace App\Policies;

use App\Business\Estacion\Acelerometrica\EstacionAcelerometrica;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AcelerometricaPolicy{
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

    public function update(User $user, EstacionAcelerometrica $acelerometrica){
        return ($user->id === $acelerometrica->user_id) &&
            ( empty($acelerometrica->lista) || (!empty($acelerometrica->lista) && empty($acelerometrica->lista->signed_file_path)) );
    }

    public function delete(User $user, EstacionAcelerometrica $acelerometrica){
        return $user->id === $acelerometrica->user_id;
    }
}
