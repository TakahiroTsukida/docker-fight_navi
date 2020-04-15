<?php

namespace App\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name',
      'gender',
      'birthday',
      'email',
      'password',
      'company_name',
      'tel',
      'address_number',
      'address_ken',
      'address_city',
      'web',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];


  public static $rules = array(
      'name' => 'required|max:60',
      'birthday' => 'required',

      'company_name' => 'required|max:255',
      'tel' => 'max:11',
      'address_number' => 'required|max:7',
      'address_ken' => 'required',
      'address_city' => 'required|max:255',

  );

  public function shops()
  {
      return $this->hasMany('App\Admin\Shop');
  }


}
