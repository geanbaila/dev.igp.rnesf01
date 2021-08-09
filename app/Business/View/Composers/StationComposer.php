<?php


namespace App\Business\View\Composers;


use App\Business\Admin\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class StationComposer{

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view){
        if (in_array($view->getName(), ['layouts.parts.left-menu','home'])){
            $view->with('station_counter', array_first($this->station_counter()));
        }
    }

    private function station_counter(){
        $user = auth()->user();
        if (!empty($user)){
            if (!$user->hasRole(Role::ADMIN_ROLE)){
                return DB::select("SELECT( SELECT COUNT( sis.id ) FROM estaciones_sismicas sis WHERE sis.deleted_at IS NULL AND sis.user_id = ? ) sismicas_count,( SELECT COUNT( acel.id ) FROM estaciones_acelerometricas acel WHERE acel.deleted_at IS NULL AND acel.user_id = ?) acelerometricas_count,( SELECT COUNT( ref.id ) FROM estaciones_referencias ref WHERE ref.deleted_at IS NULL AND ref.user_id = ?) referencias_count FROM DUAL;", [$user->id, $user->id, $user->id]);
            }else{
                return DB::select("SELECT( SELECT COUNT( sis.id ) FROM estaciones_sismicas sis WHERE sis.deleted_at IS NULL) sismicas_count,( SELECT COUNT( acel.id ) FROM estaciones_acelerometricas acel WHERE acel.deleted_at IS NULL) acelerometricas_count,( SELECT COUNT( ref.id ) FROM estaciones_referencias ref WHERE ref.deleted_at IS NULL) referencias_count FROM DUAL;");
            }
        }
    }

}