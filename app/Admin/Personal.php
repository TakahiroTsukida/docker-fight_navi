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

  public function shops()
  {
      return $this->belongsToMany('App\Admin\Shop');
  }
}
