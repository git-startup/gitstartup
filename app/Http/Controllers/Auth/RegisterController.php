<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Can_work_on;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:25', 'min:3' ,'unique:users'],
            'name' => ['required', 'string', 'max:25', 'min:3' ],
            'phone' => ['required','string', 'max:15', 'min:9'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['gender'] == 'male'){
            $avatar = asset('site/profile/logo/avatar.png');
        }elseif($data['gender'] == 'female'){
            $avatar = asset('site/profile/logo/avatar2.png');
        }


        $user = User::create([
            'name'       => $data['name'],
            'username'   => $data['username'],
            'email'      => $data['email'],
            'phone'      => $data['phone'],
            'type'       => $data['type'],
            'gender'     => $data['gender'],
            'image'      => $avatar,
            'is_disable' => 0,
            'is_deleted' => 0,
            'password'   => Hash::make($data['password']),
        ]);

        Can_work_on::create([
          'user_id' => $user->id
        ]);

        return $user;
    }
}
