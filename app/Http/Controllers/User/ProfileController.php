<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\User\Profile;
use App\User\Review;
use App\Admin\Shop;
use Carbon\Carbon;
use Storage;

class ProfileController extends Controller
{
    public function mypage($id) {
        $user = User::find($id);
        // $profile = Profile::where('user_id', $user->id);
        if (empty($user)) {
            return view('top');
        }
        $profile = $user->profiles;
        $reviews = Review::where('user_id', $user->id)->get();

        return view('user.profile.mypage',['user' => $user, 'profile' => $profile, 'reviews' => $reviews]);
    }



    public function add(Request $request) {
        $user = User::find($request->id);

        return view('user.profile.create', ['user' => $user]);
    }



    public function create(Request $request) {
        $this->validate($request, Profile::$create_rules);
        $profile = new Profile;
        $form = $request->all();

        if (isset($form['image'])) {
            $path = $form->file('image')->store('public/image/profile_images');
            $profile->image_path = basename($path);
            unset($form['image']);
        }
        unset($form['_token']);
        $profile->user_id = $form['user_id'];
        $profile->fill($form)->save();

        return redirect()->route('user.profile.mypage', ['id' => Auth::user()->id]);
    }




    public function edit(Request $request) {
        $user = User::find($request->id);
        //$profile = Profile::where('user_id', Auth::user()->id);
        $profile = $user->profiles;

        if (empty($user)) {
            abort(404);
        }

        return view('user.profile.edit', ['user' => $user, 'profile' => $profile]);
    }


    public function update(Request $request) {
        $this->validate($request, Profile::$edit_rules);
        $user = User::find($request->user_id);
        $profile = $user->profiles;
        if(empty($profile)) {
            abort(404);
        }
        // $profile = Profile::where('user_id', $request->user_id)->get();
        $form = $request->all();

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image/profile_images');
            $profile->image_path = basename($path);
            unset($form['image']);
        }

        unset($form['_token']);
        $profile->fill($form)->save();


        return redirect()->route('user.profile.mypage', ['id' => Auth::user()->id]);
    }
}
