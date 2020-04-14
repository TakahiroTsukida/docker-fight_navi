<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  protected $guarded = array('id');

  public static $rules = array(
      'name' => 'required',
      'type' => 'required',
      'tel' => 'required',
      'address_number' => 'required',
      'address_ken' => 'required',
      'address_city' => 'required',
      'join' => 'required',
      'man_price' => 'required',
      'woman_price' => 'required',
      'student_price' => 'required',
      'open' => 'required',
      'close' => 'required',
  );
}
