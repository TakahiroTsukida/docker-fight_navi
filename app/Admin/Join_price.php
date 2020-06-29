<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Join_price extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'price' => 'required|integer',
    );


    //join_pricesテーブル作成
    public static function create($form, $shop)
    {
        foreach ($form['join_price']['name'] as $key => $value)
        {
            if ($value != null)
            {
                $price = new Join_price;
                $price->shop_id = $shop->id;
                $price->name = $value;
                $price->price = $form['join_price']['price'][$key];
                $price->save();
            }
        }
    }



    //priceテーブル複製
    public static function copy($shop, $new_shop)
    {
        if (isset($shop->join_prices))
        {
            $join_prices = $shop->join_prices;

            foreach ($join_prices as $join_price) {
                $new_price = New Join_price;
                $new_price->shop_id = $new_shop->id;
                $new_price->name = $join_price->name;
                $new_price->price = $join_price->price;
                $new_price->save();
            }
        }
    }



    public function shop()
    {
        return $this->belongsTo('App\Admin\Shop');
    }
}
