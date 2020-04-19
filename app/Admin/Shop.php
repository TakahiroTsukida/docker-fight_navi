<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

  protected $fillable = [
        'admin_id',
        'tel',
        'address_number',
        'address_ken',
        'address_city',
        'open',
        'close',
        'web',
        'description',
    ];

  protected $guarded = array('id');

  public static $rules = array(
      'shop_name' => 'required',

      //配列で最低１個以上はチェック必須
      'type' => 'array|required',

      'tel' => 'nullable|max:11',
      'address_number' => 'nullable|digits:7',
      'address_ken' => 'required',
      'address_city' => 'required',

      //prices
      //片方が入力されている場合、片方も必須
      'price.name.*' => 'required_with:price.price.*|distinct',
      'price.price.*'=> 'required_with:price.name.*',

      //personals
      //どれかが入力されている場合、全ての行が入力必須
      'personal.course.*' => 'array|required_with:personal.time.*|required_with:personal.price.*',
      'personal.time.*' => 'array|numeric|required_with:personal.course.*|required_with:personal.price.*',
      'personal.price.*' => 'array|numeric|required_with:personal.course.*|required_with:personal.time.*',

      //shops
      'open' => 'nullable',
      'close' => 'nullable',
      'web' => 'nullable|active_url',
      'description' => 'nullable|max:300',

      //images
      'image' => 'nullable|image|max:512',

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
      return $this->hasMany('App\Admin\Price');
  }

  public function personals()
  {
      return $this->hasMany('App\Admin\Personal');
  }

  public function images()
  {
      return $this->hasMany('App\Admin\Image');
  }

}
