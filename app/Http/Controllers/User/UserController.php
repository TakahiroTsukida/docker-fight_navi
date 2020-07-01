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
use App\Admin\Admin;
use Carbon\Carbon;
use Storage;

class UserController extends Controller
{

    public function show_top()
    {
        return view('top');
    }

    public function show_home()
    {
        return view('user.home');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function description()
    {
        return view('description');
    }


    public function search(Request $request)
    {
        $search_name = $request->input('search_name');
        $search_type = $request->input('type');
        $search_address_ken = $request->input('address_ken');
        $search_address_city = $request->input('address_city');
        $search_sort = $request->input('sort');

        if (isset($search_name) || isset($search_type) || isset($search_address_ken) || isset($search_address_city))
        {
            //各項目の検索
            $query = Shop::query();
            //タイプ検索
            if (!empty($search_type))
            {
                $query = $query->join('shop_type', 'shops.id', '=', 'shop_type.shop_id')
                      ->whereIn('shop_type.type_id', $search_type)
                      ->select('shops.*');
            }
            //都道府県検索
            if (!empty($search_address_ken))
            {
                $query = $query->where('address_ken', $search_address_ken);
            }
            //キーワード検索
            if (!empty($search_name))
            {
                $query = $query->where('name', 'like', '%'.$search_name.'%');
            }
            //市区町村検索
            if (!empty($search_address_city))
            {
                $query = $query->where('address_city', 'like', '%'.$search_address_city.'%');
            }

            $cond_shops = $query->get()->unique('id');
        } else
        {
            $cond_shops = null;
        }

        //並び替え
        if (isset($cond_shops))
        {
            if (isset($search_sort))
            {
                //お気に入り順
                if ($search_sort == 'favorite_desc')
                {
                    $shop_info = $cond_shops->sortByDesc('favorites_count');
                }
                if ($search_sort == 'favorite_asc')
                {
                    $shop_info = $cond_shops->sortBy('favorites_count');
                }

                //ポイント順
                if ($search_sort == 'point_desc')
                {
                    $shop_info = $cond_shops->sortByDesc('point');
                }
                if ($search_sort == 'point_asc')
                {
                    $shop_info = $cond_shops->sortBy('point');
                }

                //レビュー件数順
                if ($search_sort == 'review_desc')
                {
                    $shop_info = $cond_shops->sortByDesc('reviews_count');
                }
                if ($search_sort == 'review_asc')
                {
                    $shop_info = $cond_shops->sortBy('reviews_count');
                }
            } else
            {
                $shop_info = $cond_shops;
            }
        } else
        {
            $shop_info = null;
        }

        // // ページネーション
        if (isset($shop_info))
        {
            $shops = new LengthAwarePaginator(
                $shop_info->forPage($request->page, 15),
                count($shop_info),
                15,
                $request->page,
                array('path' => $request->url())
            );
        } else
        {
            $shops = null;
        }

        return view('user.search.index', [
          'shops' => $shops,
          'search_name' => $search_name,
          'search_type' => $search_type,
          'search_address_ken' => $search_address_ken,
          'search_address_city' => $search_address_city,
          'search_sort' => $search_sort,
        ]);
    }






    public function shop(Request $request)
    {
        $shop = Shop::find($request->id);
        //$favoriteにユーザーがログインしており、かつそのshopをお気に入りをしているかをチェック
        $favorite = null;
        if(Auth::guard('user')->check())
        {
            if (count($shop->favorites) >= 1)
            {
                $favorites = $shop->favorites;
                $favorites_count = count($favorites);
                $favorite = $favorites->where('user_id', Auth::user()->id)->first();
            }
        }
        $shop_reviews = $shop->reviews->sortByDesc('updated_at');
        if (isset($shop_reviews))
        {
            $reviews = new LengthAwarePaginator(
                $shop_reviews->forPage($request->page, 15),
                count($shop_reviews),
                15,
                $request->page,
                array('path' => $request->url())
            );
        } else {
            $reviews = null;
        }

        return view('user.search.shop', [
            'shop' => $shop,
            'favorite' => $favorite,
            'reviews' => $reviews,
        ]);
    }





    public function user_info(Request $request)
    {
        $user = User::find($request->user_id);

        if (empty($user))
        {
            abort(404);
        }

        $user_reviews = $user->reviews->where('secret_name', null);

        if (isset($user_reviews))
        {
            $reviews = new LengthAwarePaginator(
                $user_reviews->forPage($request->page, 15),
                count($user_reviews),
                15,
                $request->page,
                array('path' => $request->url())
            );
        } else
        {
            $reviews = null;
        }

        return view('user.search.user', ['user' => $user, 'reviews' => $reviews]);
    }
}
