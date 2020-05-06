<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\User\Favorite;
use App\Admin\Shop;
use Carbon\Carbon;

class FavoriteController extends Controller
{
    public function add(Request $request) {
        $favorite = new Favorite;
        $favorite->user_id = Auth::user()->id;
        $favorite->shop_id = $request->shop_id;
        $favorite->save();

        $shop = Shop::find($request->shop_id);
        if (isset($shop->favorites))
        {
            $favorites = $shop->favorites->toArray();
            $favorites_count = count($favorites);
            $shop->favorites_count = $favorites_count;
            $shop->save();
        } else
        {
            $shop->favorites_count = 0;
            $shop->save();
        }
        return back()->withInput();
    }




    public function delete(Request $request)
    {
        $favorite = Favorite::where('user_id', Auth::user()->id)
                            ->where('shop_id', $request->shop_id)
                            ->first();
        $favorite->delete();

        $shop = Shop::find($request->shop_id);
        if (isset($shop->favorites))
        {
            $favorites = $shop->favorites->toArray();
            $favorites_count = count($favorites);
            $shop->favorites_count = $favorites_count;
            $shop->save();
        } else
        {
            $shop->favorites_count = 0;
            $shop->save();
        }
        return back()->withInput();
    }
}
