<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

class UserController extends Controller
{

    public function show_top() {

        return view('top');
    }

    public function show_home() {
        return view('user.home');
    }

    public function privacy() {
        return view('privacy');
    }

    public function description() {
        return view('description');
    }

    public function search(Request $request) {
        $search_name = $request->input('search_shop');
        $search_type = $request->input('type');
        $search_address_ken = $request->input('address_ken');
        $search_address_city = $request->input('address_city');
        $search_sort = $request->input('sort');

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
        //市区町村検索
        if (!empty($search_address_city)) {
            $query->where('address_city', 'like', '%'.$search_address_city.'%');
        }


        $cond_shops = $query->get()->unique('id');


        $shops = array();


        foreach ($cond_shops as $shop) {
            $total_point = 0;
            $favorites_count = 0;
            //ポイント平均
            if (count($shop->reviews) >= 1) {
                $reviews = $shop->reviews->toArray();
                $total_point = array_sum(array_column($reviews, 'total_point')) / count(array_column($reviews, 'total_point'));
            }

            //お気に入り総数
            if (count($shop->favorites) >= 1) {
                $all_fovorites = $shop->favorites->toArray();
                $favorites_count = count($all_fovorites);
            }

            $shops[] = array('shop' => $shop, 'point' => $total_point, 'favorites' => $favorites_count);
        }


        if (isset($search_sort)) {
            //お気に入り順
            if ($search_sort == 'favorite_desc') {
                foreach ((array) $shops as $key => $value) {
                    $sort[$key] = $value['favorites'];
                }
                array_multisort($sort, SORT_DESC, $shops);
            }

            if ($search_sort == 'favorite_asc') {
                foreach ((array) $shops as $key => $value) {
                    $sort[$key] = $value['favorites'];
                }
                array_multisort($sort, SORT_ASC, $shops);
            }

            //ポイント順
            if ($search_sort == 'point_desc') {
                foreach ((array) $shops as $key => $value) {
                    $sort[$key] = $value['point'];
                }
                array_multisort($sort, SORT_DESC, $shops);
            }

            if ($search_sort == 'point_asc') {
                foreach ((array) $shops as $key => $value) {
                    $sort[$key] = $value['point'];
                }
                array_multisort($sort, SORT_ASC, $shops);
            }
        }

        // dd($shops);

        return view('user.search.index', [
          'shops' => $shops,
          'search_shop' => $search_name,
          'search_type' => $search_type,
          'search_address_ken' => $search_address_ken,
          'search_address_city' => $search_address_city,
          'search_sort' => $search_sort,
        ]);
    }




    public function shop(Request $request) {
        $shop = Shop::find($request->id);
        $user = Auth::user();

        if (empty($shop)) {
            abort(404);
        }
        $query = Review::query();
        $query->join('users', 'reviews.user_id', '=', 'users.id')
              ->where('shop_id', $shop->id)
              ->select('reviews.*', 'name', 'gender', 'image_path');
        $reviews = $query->get();

        $point = $reviews->toArray();
        if (count($point) >= 1) {
            $total_point = array_sum(array_column($point, 'total_point')) / count(array_column($point, 'total_point'));
        } else {
            $total_point = null;
        }
        if(isset($user)) {
            if (count($shop->favorites) >= 1) {
                $favorites = $shop->favorites;
                $favorite = $favorites->where('user_id', $user->id)->first();
            } else {
                $favorite = null;
            }
        } else {
            $favorite = null;
        }
        return view('user.search.shop', [
            'shop' => $shop,
            'reviews' => $reviews,
            'user' => $user,
            'favorite' => $favorite,
            'total_point' => $total_point,
        ]);
    }
}
