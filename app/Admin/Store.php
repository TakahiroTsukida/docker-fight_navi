<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  protected $guarded = array('id');

  public static $rules = array(
      'admin_id' => 'required',
      'name' => 'required',
      'tel' => 'max:11',
      'address_number' => 'max:7',
      'address_ken' => 'required',
      'address_city' => 'required',
  );

  public function admin()
  {
      return $this->belongsTo('App\Admin\Admin');
  }

  public function types()
  {
      return $this->belongsToMany('App\Admin\Type');
  }

  public function prices()
  {
      return $this->belongsToMany('App\Admin\Price');
  }

  public function personals()
  {
      return $this->belongsToMany('App\Admin\Personal');
  }

  public function images()
  {
      return $this->belongsToMany('App\Admin\Image');
  }

}
