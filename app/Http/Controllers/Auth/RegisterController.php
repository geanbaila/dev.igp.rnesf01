<?php

namespace App\Http\Controllers\Auth;

use App\Business\Admin\Role;
use App\Mail\VerifyMail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    // protected $redirectTo = '/bienvenido';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        $data['username'] = strtolower($data['ruc']);
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'sigla' => 'required|string|alpha|max:15',
            'email' => 'required|string|max:255|email|valid_domains|same_email_domain:manager_email',
            'document' => 'required|digits:8',
            'password' => 'required|string|min:6|max:255|confirmed',
            'username' => 'required|string|digits:11|unique:users',
            'ruc' => 'required|string|digits:11|unique:users',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'manager_name' => 'required|string|max:255',
            'manager_document' => 'required|digits:8',
            'manager_email' => 'required|string|max:255|email|valid_domains|same_email_domain:email',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data){
        $user = User::create([
            'name' => $data['name'],
            'sigla' => strtoupper($data['sigla']),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'username' => strtolower($data['ruc']),
            'document' => $data['document'],
            'ruc' => $data['ruc'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'manager_name' => $data['manager_name'],
            'manager_document' => $data['manager_document'],
            'manager_email' => $data['manager_email'],

            'verifiable_token' => md5(str_random(10)),
        ]);

        $user->assignRole(Role::INSTITUTION_ROLE);

        Mail::to($user->email, $user->name)
            ->bcc('lexjobx@gmail.com','Alex Naupay')
            ->send(new VerifyMail($user));

        return $user;
    }

    protected function registered(Request $request, $user){
        $this->guard()->logout();
        return redirect('/registered');
    }

    public function verifyUser($token){
        $user = User::where('verifiable_token', $token)->first();
        if(!empty($user)){
            if(!$user->verified){
                $user->verified = 1;
                $user->update();
                $status = "Tu cuenta ha sido verificada. Ahora puedes iniciar sesión.";
            }else{
                $status = "Tu cuenta ya fue verificada. Puedes iniciar sesión.";
            }
        }else{
            return redirect()->route('login')->with('warning', "Esta cuenta no puede ser verificada.");
        }
        return redirect()->route('login')->with('status', $status);
    }

}
