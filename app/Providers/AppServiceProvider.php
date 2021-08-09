<?php

namespace App\Providers;

use App\Business\Admin\UserService;
use App\Business\Estacion\Acelerometrica\AcelerometricaService;
use App\Business\Estacion\Acelerometrica\EstacionAcelerometrica;
use App\Business\Estacion\Referencia\EstacionReferencia;
use App\Business\Estacion\Referencia\ReferenciaService;
use App\Business\Estacion\Sismica\EstacionSismica;
use App\Business\Estacion\Sismica\SismicasService;
use App\Business\Lista\ListaService;
use App\Business\Pais\PaisService;
use App\Business\Upload\UploadService;
use App\Business\View\Composers\StationComposer;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
        if($this->app->environment() == 'production'){
            URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);

        Relation::morphMap([
            EstacionSismica::MORPH_NAME => EstacionSismica::class,
            EstacionAcelerometrica::MORPH_NAME => EstacionAcelerometrica::class,
            EstacionReferencia::MORPH_NAME => EstacionReferencia::class,
        ]);

        Validator::extendImplicit('valid_domains', function ($attribute, $value, $parameters, $validator) {
            $domains = ['.gob.pe','.edu.pe'];
            return ends_with($value, $domains);
        },'solo se permite los dominios .gob.pe, .edu.pe');

        Validator::extendImplicit('same_email_domain', function ($attribute, $value, $parameters, $validator) {
            $data = $validator->getData();
            $parts = explode('@',$value);
            $domain = $parts[1];

            return ends_with($value, $domain) && ends_with($data[$parameters[0]], $domain);
        },'los correos no pertenecen al mismo dominio');

        $this->app->singleton('App\Business\Admin\UserService', function ($app) {
            return new UserService();
        });
        $this->app->singleton('App\Business\Pais\PaisService', function ($app) {
            return new PaisService();
        });
        $this->app->singleton('App\Business\Estacion\Sismica\SismicasService', function ($app) {
            return new SismicasService();
        });
        $this->app->singleton('App\Business\Estacion\Acelerometrica\AcelerometricaService', function ($app) {
            return new AcelerometricaService();
        });
        $this->app->singleton('App\Business\Estacion\Referencia\ReferenciaService', function ($app) {
            return new ReferenciaService();
        });

        $this->app->singleton('App\Business\Lista\ListaService', function ($app) {
            return new ListaService();
        });

        $this->app->singleton('App\Business\Upload\UploadService', function ($app) {
            return new UploadService();
        });

        View::composer('*', StationComposer::class);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(){
        //
    }
}
