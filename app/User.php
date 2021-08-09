<?php

namespace App;

use App\Business\Admin\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable {
    use Notifiable;
    use HasRoles;
    use SoftDeletes;

    const USER_TYPE_USER = 1;
    const USER_TYPE_INSTITUTION = 2;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','sigla', 'email', 'password', 'username', 'ruc', 'document','phone', 'address',
        'manager_name', 'manager_document', 'manager_email', 'verifiable_token', 'verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getIsAdminAttribute(){
        return $this->hasRole(Role::ADMIN_ROLE);
    }
}
