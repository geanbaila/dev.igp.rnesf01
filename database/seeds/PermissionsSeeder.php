<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        app()['cache']->forget('spatie.permission.cache');
        if (\App\Business\Admin\Role::all()->count() == 0){
            \App\Business\Admin\Role::create(['name'=>'admin','human_name'=>'Superman','description'=>'Superman!. User with all of permissions']);
            \App\Business\Admin\Role::create(['name'=>'authenticated','human_name'=>'Authenticated','description'=>'An authenticated user']);

            \App\Business\Admin\Role::create(['name'=>'boss_area','human_name'=>'Area Boss']);
            \App\Business\Admin\Role::create(['name'=>'boss_office','human_name'=>'Office Boss']);
            \App\Business\Admin\Role::create(['name'=>'assistant','human_name'=>'Area Assistant']);
            \App\Business\Admin\Role::create(['name'=>'institution','human_name'=>'Institución']);
        }

        if (\App\Business\Admin\Permission::all()->count() == 0) {
            // Roles
            \App\Business\Admin\Permission::create(['name' => 'roles_create']);
            \App\Business\Admin\Permission::create(['name' => 'roles_read']);
            \App\Business\Admin\Permission::create(['name' => 'roles_update']);
            \App\Business\Admin\Permission::create(['name' => 'roles_delete']);

            // Permissions
            \App\Business\Admin\Permission::create(['name' => 'permissions_create']);
            \App\Business\Admin\Permission::create(['name' => 'permissions_read']);
            \App\Business\Admin\Permission::create(['name' => 'permissions_update']);
            \App\Business\Admin\Permission::create(['name' => 'permissions_delete']);

            // Users
            \App\Business\Admin\Permission::create(['name' => 'users_create']);
            \App\Business\Admin\Permission::create(['name' => 'users_read_any']);
            \App\Business\Admin\Permission::create(['name' => 'users_read_own']);
            \App\Business\Admin\Permission::create(['name' => 'users_update_any']);
            \App\Business\Admin\Permission::create(['name' => 'users_update_own']);
            \App\Business\Admin\Permission::create(['name' => 'users_delete_any']);
            \App\Business\Admin\Permission::create(['name' => 'users_delete_own']);

            // Stations
            \App\Business\Admin\Permission::create(['name' => 'stations_create']);
            \App\Business\Admin\Permission::create(['name' => 'stations_read_any']);
            \App\Business\Admin\Permission::create(['name' => 'stations_read_own']);
            \App\Business\Admin\Permission::create(['name' => 'stations_update_any']);
            \App\Business\Admin\Permission::create(['name' => 'stations_update_own']);
            \App\Business\Admin\Permission::create(['name' => 'stations_delete_any']);
            \App\Business\Admin\Permission::create(['name' => 'stations_delete_own']);
        }

        $user = \App\User::where('username','=','administrador')->limit(1)->first();
        $user->assignRole(\App\Business\Admin\Role::ADMIN_ROLE);
        $user->givePermissionTo(['stations_read_any']);

        $role = \App\Business\Admin\Role::where('name','=', \App\Business\Admin\Role::ADMIN_ROLE)->first();
        $role->givePermissionTo(['users_read_any', 'users_create','users_update_any','users_delete_any']);
        $role->givePermissionTo(['roles_read', 'roles_create','roles_update','roles_delete']);
        $role->givePermissionTo(['permissions_read', 'permissions_create','permissions_update','permissions_delete']);

        $role = \App\Business\Admin\Role::where('name','=', \App\Business\Admin\Role::INSTITUTION_ROLE)->first();
        $role->givePermissionTo(['stations_create', 'stations_read_own', 'stations_update_own', 'stations_delete_own']);

    }
}
