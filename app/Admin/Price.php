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



  public function stores()
  {
      return $this->belongsToMany('App\Admin\Store');
  }
}
