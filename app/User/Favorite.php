<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Admin\Shop;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'shop_id',
    ];


    protected $dates = ['display_date'];

    public static $rules = array(
        'user_id' => 'required|numeric',
        'shop_id' => 'required|numeric',
    );



    public static function favorite_add($shop_id)
    {
        $favorite = new Favorite;
        $favorite->user_id = Auth::guard('user')->user()->id;
        $favorite->shop_id = $shop_id;
        $favorite->save();
        return $favorite;
    }




    public static function favorite_delete($shop_id)
    {
        $favorite = Favorite::where('user_id', Auth::guard('user')->user()->id)
                            ->where('shop_id', $shop_id)
                            ->first();
        $favorite->delete();
        return $favorite;
    }




    public static function shop_favorites($shop_id)
    {
        $shop = Shop::find($shop_id);
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
    }


    public function user() {
        return $this->belongsTo('App\User');
    }

    public function shop() {
        return $this->belongsTo('App\Admin\Shop', 'shop_id');
    }
}
