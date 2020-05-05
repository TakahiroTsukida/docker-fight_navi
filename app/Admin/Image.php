<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

  protected $guarded = array('id');

  public static $rules = array(
      'image_path' => 'required|string',
  );


  public function shop()
  {
      return $this->belongsTo('App\Admin\Shop');
  }
}
