<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
  protected $guarded = array('id');

  public static $rules = array(
      'name' => 'required',
      'course' => 'required|string',
      'time' => 'required|integer',
      'price' => 'required|integer',
  );



  //personalテーブル作成
  public static function personals_create($form, $shop)
  {
    foreach ($form['personal']['course'] as $key => $value)
        {
            if ($value != null)
            {
                $personal = new Personal;
                $personal->shop_id = $shop->id;
                $personal->course = $value;
                $personal->time = $form['personal']['time'][$key];
                $personal->price = $form['personal']['price'][$key];
                $personal->save();
            }
        }
  }


  //personalテーブル複製
  public static function personals_copy($shop, $new_shop)
  {
      if (isset($shop->personals))
      {
          $personals = $shop->personals;

          foreach ($personals as $personal) {
              $new_personal = New Personal;
              $new_personal->shop_id = $new_shop->id;
              $new_personal->course = $personal->course;
              $new_personal->time = $personal->time;
              $new_personal->price = $personal->price;
              $new_personal->save();
          }
      }
  }

  public function shop()
  {
      return $this->belongsTo('App\Admin\Shop');
  }
}
