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

  public function shop()
  {
      return $this->belongsTo('App\Admin\Shop');
  }
}
