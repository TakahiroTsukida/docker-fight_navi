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
    // protected $redirectTo = RouteServiceProvider::ADMIN_HOME;
    protected function redirectTo() {
        session()->flash('flash_message_admin_login', 'ログインしました');
        return '/admin/profile/mypage';
    }
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
            // 'gender' => ['nullable'],
            // 'birthday' => ['nullable', 'date', 'before:now'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins','unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],

            // 'company_name' => ['nullable', 'string', 'max:255'],
            // 'tel' => ['nullable', 'max:13'],
            // 'address_number' => ['nullable', 'string', 'max:8'],
            // 'address_ken' => ['nullable', 'string', 'max:255'],
            // 'address_city' => ['nullable', 'string', 'max:255'],

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
            // 'gender' => $data['gender'],
            // 'birthday' => $data['birthday'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

            // 'company_name' => $data['company_name'],
            // 'tel' => $data['tel'],
            // 'address_number' => $data['address_number'],
            // 'address_ken' => $data['address_ken'],
            // 'address_city' => $data['address_city'],
            // 'web' => $data['web'],
        ]);
    }
}
