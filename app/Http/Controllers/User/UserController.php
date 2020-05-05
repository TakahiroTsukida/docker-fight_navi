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
        //各項目の検索
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
        //全検索結果を格納
        $cond_shops = $query->get()->unique('id');

        //各項目の並べ替え
        $shops = array();

        foreach ($cond_shops as $shop) {
            $total_point = 0;
            $reviews_count = 0;
            $favorites_count = 0;
            //ポイント平均、レビュー件数の取得
            if (count($shop->reviews) >= 1) {
                //shopに対するreviewの取得
                $reviews = $shop->reviews->toArray();
                //総合評価の平均点（割り算）
                $total_point = array_sum(array_column($reviews, 'total_point')) / count(array_column($reviews, 'total_point'));
                //レビュー件数の取得
                $reviews_count = count($reviews);
            }

            //お気に入り総数の取得
            if (count($shop->favorites) >= 1) {
                $all_fovorites = $shop->favorites->toArray();
                $favorites_count = count($all_fovorites);
            }

            $shops[] = array(
                          'shop' => $shop,
                          'point' => $total_point,
                          'favorites' => $favorites_count,
                          'reviews' => $reviews_count,
                      );
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
            //レビュー件数順
            if ($search_sort == 'review_desc') {
                foreach ((array) $shops as $key => $value) {
                    $sort[$key] = $value['reviews'];
                }
                array_multisort($sort, SORT_DESC, $shops);
            }
            if ($search_sort == 'review_asc') {
                foreach ((array) $shops as $key => $value) {
                    $sort[$key] = $value['reviews'];
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

        if (isset($shop)) {
            $shop_info = array();
            $total_point = 0;
            $reviews_count = 0;
            $favorites_count = 0;
            //ポイント平均、レビュー件数の取得
            if (count($shop->reviews) >= 1) {
                //shopに対するreviewの取得
                $reviews = $shop->reviews->toArray();
                //総合評価の平均点（割り算）
                $total_point = array_sum(array_column($reviews, 'total_point')) / count(array_column($reviews, 'total_point'));
                //レビュー件数の取得
                $reviews_count = count($reviews);
            }

            //お気に入り総数の取得
            if (count($shop->favorites) >= 1) {
                $all_fovorites = $shop->favorites->toArray();
                $favorites_count = count($all_fovorites);
            }

            $shop_info[] = array(
                          'shop' => $shop,
                          'reviews' => $reviews,
                          'total_point' => $total_point,
                          'favorites_count' => $favorites_count,
                          'reviews_count' => $reviews_count,
                      );



        } else {
            abort(404);
        }
        // dd($shop_info);


        $query = Review::query();
        //$reviewsに、レビュー内容＋userの情報をjoin
        $query->join('users', 'reviews.user_id', '=', 'users.id')
              ->where('shop_id', $shop->id)
              ->select('reviews.*', 'name', 'gender', 'image_path');
        $reviews = $query->get();

        //$total_pointに評価点の平均をもとめる、レビューがなければNULL
        $point = $reviews->toArray();
        if (count($point) >= 1) {
            $total_point = array_sum(array_column($point, 'total_point')) / count(array_column($point, 'total_point'));
        } else {
            $total_point = null;
        }

        //$favoriteにユーザーがログインしており、かつそのshopをお気に入りをしているかをチェック
        if(isset($user)) {
            if (count($shop->favorites) >= 1) {
                $favorites = $shop->favorites;
                $favorites_count = count($favorites);
                $favorite = $favorites->where('user_id', $user->id)->first();
            } else {
                $favorite = null;
            }
        } else {
            $favorite = null;
        }

        return view('user.search.shop', [
            'shop' => $shop,
            'shop_info' => $shop_info,
            'reviews' => $reviews,
            'favorite' => $favorite,
            'total_point' => $total_point,
        ]);
    }
}
