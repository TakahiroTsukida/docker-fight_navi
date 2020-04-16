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



  public function shops()
  {
      return $this->belongsTo('App\Admin\Shop');
  }
}
