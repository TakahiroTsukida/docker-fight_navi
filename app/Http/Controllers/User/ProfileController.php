<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\User;
use App\User\Profile;
use App\User\Review;
use App\User\Favorite;
use App\Admin\Shop;
use Carbon\Carbon;
use Storage;

class ProfileController extends Controller
{
    public function mypage(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if (empty($user))
        {
            return view('top');
        }
        $user_reviews = $user->reviews->sortByDesc('updated_at');

        $reviews = new LengthAwarePaginator(
            $user_reviews->forPage($request->page, 10),
            count($user_reviews),
            10,
            $request->page,
            array('path' => $request->url())
        );

        return view('user.profile.mypage',['user' => $user, 'reviews' => $reviews]);
    }




    public function edit()
    {
        $user = User::find(Auth::user()->id);
        if (empty($user))
        {
            abort(404);
        }

        return view('user.profile.edit', ['user' => $user]);
    }




    public function update(Request $request)
    {
        $this->validate($request, User::$rules);
        $user = User::find(Auth::user()->id);
        if(empty($user))
        {
            abort(404);
        }
        $form = $request->all();

        if (isset($form['secret_gender']))
        {
            $user->secret_gender = 1;
        } else {
            $user->secret_gender = null;
        }

        if (isset($form['secret_birthday']))
        {
            $user->secret_birthday = 1;
        } else {
            $user->secret_birthday = null;
        }

        if (isset($form['image']))
        {
            $path = $request->file('image')->store('public/image/profile_images');
            $user->image_path = basename($path);
            unset($form['image']);
        } elseif (isset($request->remove))
        {
            $user->image_path = null;
            unset($form['remove']);
        }
        unset($form['_token']);
        $user->fill($form)->save();

        return redirect('user/profile/mypage');
    }




    public function resets_email()
    {
        return view('user.profile.emails.reset');
    }


    public function favorite(Request $request)
    {
        $user = Auth::user();
        $user_favorites = $user->favorites;

        $favorites = new LengthAwarePaginator(
            $user_favorites->forPage($request->page, 20),
            count($user_favorites),
            20,
            $request->page,
            array('path' => $request->url())
        );

        return view('user.profile.favorite', ['favorites' => $favorites]);
    }
}
