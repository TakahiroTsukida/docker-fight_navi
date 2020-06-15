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
      // 'company_name',
      // 'tel',
      // 'address_number',
      // 'address_ken',
      // 'address_city',
      // 'web',
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
      'gender' => 'nullable',
      'birthday' => 'nullable|before:now',

      // 'company_name' => 'nullable|max:255',
      // 'tel' => 'nullable|max:13',
      // 'address_number' => 'nullable|max:8',
      // 'address_ken' => 'nullable',
      // 'address_city' => 'nullable|max:255',

  );

  public function shops()
  {
      return $this->hasMany('App\Admin\Shop');
  }


}
