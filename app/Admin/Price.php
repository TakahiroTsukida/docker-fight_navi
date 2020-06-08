<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{

  protected $guarded = array('id');

  public static $rules = array(
      'name' => 'required',
      'price' => 'required|integer',
  );


  //priceテーブル作成
  public static function prices_create($form, $shop)
  {
    foreach ($form['price']['name'] as $key => $value)
    {
        if ($value != null)
        {
            $price = new Price;
            $price->shop_id = $shop->id;
            $price->name = $value;
            $price->price = $form['price']['price'][$key];
            $price->save();
        }
    }
  }



  //priceテーブル複製
  public static function prices_copy($shop, $new_shop)
  {
      if (isset($shop->prices))
      {
          $prices = $shop->prices;

          foreach ($prices as $price) {
              $new_price = New Price;
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
