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
    // public function store(Request $request) {
    //     \Auth::user()->favorite($id);
    //     dd($request);
    //     return back();
    // }
    //
    // public function destroy($id) {
    //     \Auth::user()->unfavorite($id);
    //     return back();
    // }

    public function add(Request $request) {
        $favorite = new Favorite;
        $favorite->user_id = Auth::user()->id;
        $favorite->shop_id = $request->shop_id;
        $favorite->save();
        return redirect()->route('user.shop', ['id' => $request->shop_id]);
    }

    public function delete(Request $request) {

        $favorite = Favorite::where('user_id', Auth::user()->id)
                            ->where('shop_id', $request->shop_id)
                            ->first();

        $favorite->delete();

        return redirect()->route('user.shop', ['id' => $request->shop_id]);
    }

    public function mypage_delete(Request $request){
        $favorite = Favorite::where('user_id', Auth::user()->id)
                            ->where('shop_id', $request->shop_id)
                            ->first();

        $favorite->delete();

        return redirect('user/profile/favorite');
    }


    // public function search_add(Request $request) {
    //     $favorite = new Favorite;
    //     $favorite->user_id = Auth::user()->id;
    //     $favorite->shop_id = $request->shop_id;
    //     $favorite->save();
    //
    //     return redirect()->route('user.search',[
    //       // 'search_shop' => $search_name,
    //       // 'type' => $search_type,
    //       // 'address_ken' => $search_address_ken,
    //       // 'address_city' => $search_address_city,
    //     ]);
    // }
    // 
    //
    // public function search_delete(Request $request) {
    //     $favorite = Favorite::where('user_id', Auth::user()->id)
    //                         ->where('shop_id', $request->shop_id)
    //                         ->first();
    //
    //     $favorite->delete();
    //
    //     return redirect()->route('user.search',[
    //       // 'search_shop' => $request->search_shop,
    //       // 'type' => $request->search_type,
    //       // 'address_ken' => $request->search_address_ken,
    //       // 'address_city' => $request->search_address_city,
    //     ]);
    // }
}
