<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
  protected $guarded = array('id');

  public static $rules = array(
      'name' => 'required',
  );

  public function shops()
  {
      return $this->belongsToMany('App\Admin\Shop', 'shop_type', 'shop_id', 'type_id');
  }
}
