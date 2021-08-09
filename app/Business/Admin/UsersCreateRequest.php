<?php

namespace App\Business\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UsersCreateRequest extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'password' => 'required|string|min:6|max:255|confirmed',
            'username' => 'required|string|max:255|unique:users',
            'ruc' => 'required|string|digits:11|unique:users',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'manager_name' => 'required|string|max:255',
            'manager_document' => 'required|string|max:255',
            'manager_email' => 'required|string|max:255|email',
        ];
    }

    public function attributes(){
        return [
            'name' => '',
            'email' => '',
            'password' => 'contraseña',
            'password_confirmation' => '',
            'username' => '',
            'ruc' => '',
            'phone' => '',
            'address' => '',
            'manager_name' => '',
            'manager_document' => '',
            'manager_email' => '',
        ];
    }
}
