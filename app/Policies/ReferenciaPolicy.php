<?php

namespace App\Policies;

use App\Business\Estacion\Acelerometrica\EstacionAcelerometrica;
use App\Business\Estacion\Referencia\EstacionReferencia;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReferenciaPolicy{
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

    public function update(User $user, EstacionReferencia $referencia){
        return ($user->id === $referencia->user_id) &&
            ( empty($referencia->lista) || (!empty($referencia->lista) && empty($referencia->lista->signed_file_path)) );
    }

    public function delete(User $user, EstacionReferencia $referencia){
        return $user->id === $referencia->user_id;
    }

}
