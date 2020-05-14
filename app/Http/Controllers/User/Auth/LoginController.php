<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Admin\Admin;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::MYPAGE;
    protected function redirectTo() {
        session()->flash('flash_message_user_login', 'ログインしました');
        return '/user/profile/mypage';
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('user');
    }

    // ログイン画面
    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        return $this->loggedOut($request);
    }

    // ログアウトした時のリダイレクト先
    public function loggedOut(Request $request)
    {
        session()->flash('flash_message_user_logout', 'ログアウトしました');
        return redirect(route('user.login'));
    }


    //google認証
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $gUser = Socialite::driver('google')->stateless()->user();
        // email が合致するユーザーを取得
        $user = User::where('email', $gUser->email)->first();
        $admin = Admin::where('email', $gUser->email)->first();
        // 見つからなければ新しくユーザーを作成
        if ($user == null) {
            if ($admin == null)
            {
                $user = $this->createUserByGoogle($gUser);
            } else {
                session()->flash('flash_message_user_email_unique', 'そのメールアドレスは既に使われています');
                return redirect()->route('user.login');
            }

        }
        // ログイン処理
        \Auth::login($user, true);
        session()->flash('flash_message_user_login', 'ログインしました');
        return redirect('user/profile/mypage');
    }

    public function createUserByGoogle($gUser)
    {
        $user = User::create([
            'name'     => $gUser->name,
            'email'    => $gUser->email,
            'password' => \Hash::make(uniqid()),
        ]);
        return $user;
    }
}
