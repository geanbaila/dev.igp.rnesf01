<?php

namespace App\Business\Admin;

use App\User;

class UserService{

    public function findAll(){
        return User::where('user_type', User::USER_TYPE_INSTITUTION)->get();
    }

    public function findAllToPaginate(){
        return User::where('user_type', User::USER_TYPE_INSTITUTION);
    }

    public function save($data){
        // $data['user_id'] = auth()->user()->id;
        $user = new User();
        $data['password'] = bcrypt($data['password']);
        $user->fill($data);
        $user->save();
        return $user;
    }

    public function update($id, $data){
        if (is_a($id, User::class)) $user = $id;
        else $user = User::findOrFail($id);

        if (key_exists('password', $data)){
            if (empty($data['password'])){
                array_forget($data, 'password');
            }else{
                $data['password'] = bcrypt($data['password']);
            }
        }

        $user->fill($data);
        if($user->isDirty()){
            $user->update();
        }
        return $user;
    }

    public function findById($id){
        return User::withTrashed()->where('id', '=', $id)->first();
    }



}