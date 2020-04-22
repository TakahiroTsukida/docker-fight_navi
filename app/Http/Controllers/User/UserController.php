<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\User\Profile;
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
        $shop = Shop::find($request->id);
        if (empty($shop)) {
            abort(404);
        }

        return view('user.search.shop', ['shop' => $shop]);
    }
}
