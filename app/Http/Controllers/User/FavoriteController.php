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
    public function add(Request $request)
    {
        $shop_id = $request->shop_id;

        //お気に入り登録
        $favorite = Favorite::favorite_add($shop_id);

        //shopのお気に入り数を更新        
        Favorite::shop_favorites($shop_id);
        
        session()->flash('flash_message_add', $favorite->shop->name.' をお気に入り登録しました');
        return back()->withInput();
    }




    public function delete(Request $request)
    {
        $shop_id = $request->shop_id;

        //お気に入り削除
        $favorite = Favorite::favorite_delete($shop_id);

        //shopのお気に入り数を更新
        Favorite::shop_favorites($shop_id);

        session()->flash('flash_message_delete', $favorite->shop->name.' をお気に入りから削除しました');
        return back()->withInput();
    }
}
