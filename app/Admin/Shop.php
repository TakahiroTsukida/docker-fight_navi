<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

  protected $fillable = [
        'admin_id',
        'name',
        'tel',
        'address_number',
        'address_ken',
        'address_city',
        'address_other',
        'close',
        'web',
        'trial',
        'trial_price',
        'description',
    ];

  protected $guarded = array('id');

  public static $rules = array(
      'name' => 'required',

      //配列で最低１個以上はチェック必須
      'type' => 'array|required',

      'tel' => 'nullable|max:13',
      'address_number' => 'nullable|max:8',
      'address_ken' => 'required',
      'address_city' => 'required',
      'address_other' => 'nullable:max:255',

      //prices
      //片方が入力されている場合、片方も必須
      'price.name.*' => 'required_with:price.price.*|max:255',
      'price.price.*'=> 'required_with:price.name.*|max:255',

      //personals
      //どれかが入力されている場合、全ての行が入力必須
      'personal.course.*' => 'required_with:personal.time.*|required_with:personal.price.*|max:255',
      'personal.time.*' => 'required_with:personal.course.*|required_with:personal.price.*|max:255',
      'personal.price.*' => 'required_with:personal.course.*|required_with:personal.time.*|max:255',

      //shops
      'close' => 'nullable|max:255',
      'web' => 'nullable|max:255',
      'trial' => 'required|max:255',
      'trial_price' => 'nullable|numeric|max:10',
      'description' => 'nullable|max:255',

      //images
      'image' => 'nullable|image|max:1024',

      'open.day.*' => 'nullable|required_with:open.time.*|max:100',
      'open.time.*' => 'nullable|required_with:open.day.*|max:255',
  );

  public function admin()
  {
      return $this->belongsTo('App\Admin\Admin');
  }

  public function types()
  {
      return $this->belongsToMany('App\Admin\Type', 'shop_type', 'shop_id', 'type_id');
  }

  public function prices()
  {
      return $this->hasMany('App\Admin\Price');
  }

  public function opens()
  {
      return $this->hasMany('App\Admin\Open');
  }

  public function personals()
  {
      return $this->hasMany('App\Admin\Personal');
  }

  public function reviews() {
      return $this->hasMany('App\User\Review');
  }

  public function favorites() {
      return $this->hasMany('App\User\Favorite');
  }

}
