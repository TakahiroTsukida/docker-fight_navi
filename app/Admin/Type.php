<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
  protected $guarded = array('id');

  public static $rules = array(
      'name' => 'required',
  );


  //shop_typeテーブル保存
  public static function shop_type_create($form, $shop)
  {
    if (is_array($form['type']))
    {
      foreach ($form['type'] as $key => $value)
      {
          $shop->types()->detach($value);
          $shop->types()->attach($value);
      }
    }
  }


  public function shops()
  {
      return $this->belongsToMany('App\Admin\Shop');
  }
}
