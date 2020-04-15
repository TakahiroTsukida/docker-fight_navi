<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
  protected $guarded = array('id');

  public static $rules = array(
      'name' => 'required',
  );

  public function stores()
  {
      return $this->belongsToMany('App\Admin\Store');
  }
}
