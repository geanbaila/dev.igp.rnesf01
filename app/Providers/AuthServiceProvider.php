<?php

namespace App\Providers;

use App\Business\Admin\Role;
use App\Business\Estacion\Acelerometrica\EstacionAcelerometrica;
use App\Business\Estacion\Referencia\EstacionReferencia;
use App\Business\Estacion\Sismica\EstacionSismica;
use App\Policies\AcelerometricaPolicy;
use App\Policies\ReferenciaPolicy;
use App\Policies\SismicaPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        EstacionSismica::class => SismicaPolicy::class,
        EstacionAcelerometrica::class => AcelerometricaPolicy::class,
        EstacionReferencia::class => ReferenciaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(){
        $this->registerPolicies();

        Gate::define('filter-institutions', function ($user) {  // Check if a user can filter by institution
            return $user->hasRole(Role::ADMIN_ROLE);
        });

        Gate::define('upload-formats', function ($user) {  // Check if a user can upload-formats
            return !$user->hasRole(Role::ADMIN_ROLE);
        });

    }
}
