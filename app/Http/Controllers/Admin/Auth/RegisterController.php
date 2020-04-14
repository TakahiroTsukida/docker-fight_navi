<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Admin\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }


    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function showRegistrationForm()
    {
        return view('admin.auth.register');
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
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:8'],
            'birthday' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'company_name' => ['required', 'string', 'max:255'],
            'tel' => ['max:11'],
            'address_number' => ['required', 'string', 'max:255'],
            'address_ken' => ['required', 'string', 'max:255'],
            'address_city' => ['required', 'string', 'max:255'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Admin
     */
    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'gender' => $data['gender'],
            'birthday' => $data['birthday'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

            'company_name' => $data['company_name'],
            'tel' => $data['tel'],
            'address_number' => $data['address_number'],
            'address_ken' => $data['address_ken'],
            'address_city' => $data['address_city'],
            'web' => $data['web'],
        ]);
    }
}
