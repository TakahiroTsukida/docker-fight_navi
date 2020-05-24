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



  public function shop()
  {
      return $this->belongsTo('App\Admin\Shop');
  }
}
