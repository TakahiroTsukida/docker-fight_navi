<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;
use Storage;

class UserController extends Controller
{

    public function show_top() {
        return view('top');
    }

    public function show_home() {
        return view('user.home');
    }

    public function search(Request $request) {
      //  dd($request);
      //  $cond_search_shop = $request->input('search_shop');

        //dd($cond_search_shop);

        return view('user.search.index');
    }

    public function shop() {
        return view('user.search.shop');
    }


    public function mypage() {

        return view('user.profile.mypage');
    }

    public function edit() {
        $user = User::find(Auth::user()->id);

        if (empty($user)) {
            abort(404);
        }

        return view('user.profile.edit', ['user' => $user]);
    }


    public function update(Request $request) {
        $this->validate($request, User::$rules);
        $user = User::find(Auth::user()->id);
        $user_form = $request->all();

        if (isset($user_form['image'])) {
            $path = Storage::disk('s3')->putFile('/', $form['image'], 'public');
            $user->image_path = Storage::disk('s3')->url($path);
            unset($user_form['image']);
        } elseif (isset($request->remove)) {
            $user->image_path = null;
            unset($user_form['remove']);
        }

        unset($user_form['_token']);
        $user->fill($user_form)->save();

        return redirect('user/profile/mypage');
    }
}
