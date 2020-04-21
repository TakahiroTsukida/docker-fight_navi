<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Admin\Shop;
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
        //dd($request);
        $search_name = $request->input('search_shop');
        $search_type = $request->input('type');
        $search_address_ken = $request->input('address_ken');

        $query = Shop::query();
        //タイプ検索
        if (!empty($search_type)) {
            $query->join('shop_type', 'shops.id', '=', 'shop_type.shop_id')
                  ->whereIn('shop_type.type_id', $search_type)
                  ->select('shops.*');
        }


        //都道府県検索
        if (!empty($search_address_ken)) {
            $query->where('address_ken', $search_address_ken);
        }
        //キーワード検索
        if (!empty($search_name)) {
            $query->where('name', 'like', '%'.$search_name.'%');
        }

        $cond_shops = $query->get();
        $shops = $cond_shops->unique('id');

        return view('user.search.index', [
          'shops' => $shops,
          'search_shop' => $search_name,
          'search_type' => $search_type,
          'search_address_ken' => $search_address_ken,
        ]);
    }




    public function shop(Request $request) {
        dd($request);
        $shop = Shop::find($request->id);
        if (empty($shop)) {
            abort(404);
        }

        return view('user.search.shop', ['shop' => $shop]);
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
