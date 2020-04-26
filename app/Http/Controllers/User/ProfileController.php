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
    public function mypage() {
        $user = User::find(Auth::user()->id);
        // $profile = Profile::where('user_id', $user->id);
        if (empty($user)) {
            return view('top');
        }
        $reviews = Review::join('shops', 'reviews.shop_id', '=', 'shops.id')
                          ->select('reviews.*', 'name', 'address_ken', 'address_city')
                          ->where('user_id', $user->id)
                          ->get()->sortByDesc('updated_at');

        // $reviews = Review::where('user_id', $user->id)->get();
        //
        // $reviews = Review::query();
        // $query->leftJoin('shops', 'reviews.shop_id', '=', 'shops.id')
        //       ->where('user_id', $user->id);
        // $reviews = $query->get()->sortByDesc('updated_at');
        return view('user.profile.mypage',['user' => $user, 'reviews' => $reviews]);
    }



    // public function add() {
    //     $user = User::find(Auth::user()->id);
    //
    //     return view('user.profile.create', ['user' => $user]);
    // }
    //
    //
    //
    // public function create(Request $request) {
    //     $this->validate($request, User::$rules);
    //     $user = User::find(Auth::user()->id);
    //     $form = $request->all();
    //
    //     if (isset($form['image'])) {
    //         $path = $form->file('image')->store('public/image/profile_images');
    //         $user->image_path = basename($path);
    //         unset($form['image']);
    //     }
    //     unset($form['_token']);
    //     $user->fill($form)->save();
    //
    //     return redirect()->route('user.profile.mypage', ['id' => Auth::user()->id]);
    // }




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
        if(empty($user)) {
            abort(404);
        }
        $form = $request->all();

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image/profile_images');
            $user->image_path = basename($path);
            unset($form['image']);
        } elseif (isset($request->remove)) {
            $user->image_path = null;
            unset($form['remove']);
        }
        unset($form['_token']);
        $user->fill($form)->save();

        return redirect('user/profile/mypage');
    }

    public function resets_email() {
        return view('user.profile.emails.reset');
    }
}
