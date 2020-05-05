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

  public function shop()
  {
      return $this->belongsTo('App\Admin\Shop');
  }
}
