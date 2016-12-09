<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Storage;

class RegisterController extends Controller
{
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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        /*
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        */

        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'company' => 'required|max:255',
            'company_position' => 'required|max:255',
            'phone' => 'required|max:255',
            'company_activity' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['first_name'].' '.$data['last_name'] ,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'company' =>$data['company'],
            'first_name' =>$data['first_name'],
            'last_name' =>$data['last_name'],
            'company_position' =>$data['company_position'],
            'phone' =>$data['phone'],
            'company_activity' =>$data['company_activity'],
            'address' =>$data['address'],
            'city' =>$data['city'],
            'state' =>$data['state'],
            'zip' =>$data['zip'],
        ]);
        $directory = 'user_'.$user->id;

        Storage::makeDirectory($directory);
       // dd($user);
        return $user;
    }
}
