<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Other_price extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'price' => 'required|integer',
    );


    //other_priceテーブル作成
    public static function create($form, $shop)
    {
        foreach ($form['other_price']['name'] as $key => $value)
        {
            if ($value != null)
            {
                $price = new Other_price;
                $price->shop_id = $shop->id;
                $price->name = $value;
                $price->price = $form['other_price']['price'][$key];
                $price->save();
            }
        }
    }



    //other_priceテーブル複製
    public static function copy($shop, $new_shop)
    {
        if (isset($shop->other_prices))
        {
            $other_prices = $shop->other_prices;

            foreach ($other_prices as $price) {
                $new_price = New Other_price;
                $new_price->shop_id = $new_shop->id;
                $new_price->name = $price->name;
                $new_price->price = $price->price;
                $new_price->save();
            }
        }
    }



    public function shop()
    {
        return $this->belongsTo('App\Admin\Shop');
    }
}
