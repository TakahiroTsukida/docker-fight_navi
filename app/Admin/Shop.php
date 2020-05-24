<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Admin\Admin;
use App\Admin\Shop;
use Carbon\Carbon;

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
      'price.price.*'=> 'nullable|required_with:price.name.*|integer|between:1,1000000',

      //personals
      //どれかが入力されている場合、全ての行が入力必須
      'personal.course.*' => 'nullable|required_with:personal.time.*|required_with:personal.price.*|max:255',
      'personal.time.*' => 'nullable|required_with:personal.course.*|required_with:personal.price.*|integer|between:1,1000000',
      'personal.price.*' => 'nullable|required_with:personal.course.*|required_with:personal.time.*|integer|between:1,1000000',

      //shops
      'close' => 'nullable|max:255',
      'web' => 'nullable|max:255',
      'trial' => 'required',
      'trial_price' => 'nullable|integer|between:1,1000000',
      'description' => 'nullable|max:255',

      //images
      'image' => 'nullable|image|max:1024',

      'open.day.*' => 'nullable|required_with:open.time.*|max:100',
      'open.time.*' => 'nullable|required_with:open.day.*',
  );



  //shopテーブル保存
  public static function shop_create($form, $shop)
  {
        $admin = Auth::guard('admin')->user();
        $shop->admin_id = $admin->id;
        if (isset($form['image']))
        {
            $path = $form['image']->store('public/image/shop_images');
            $shop->image_path = basename($path);
            unset($form['image']);
        } elseif (isset($form['remove'])) {
            $shop->image_path = null;
            unset($form['remove']);
        }
        $shop->fill($form)->save();
        return $shop;        
  }


  //他のユーザーの情報の更新禁止
  public static function admin_inspection($shop)
  {
        if ($shop->admin_id != Auth::guard('admin')->user()->id)
        {
            session()->flash('flash_message_no_auth', '他のユーザーの編集情報は見れません');
            return back();
        }
  } 


  //shop_idがない場合
  public static function empty_shop($shop)
  {
    if (empty($shop))
    {
        session()->flash('flash_message_no_auth', '他のユーザーの編集情報は見れません');
        return back();
    }
  }



  //リレーション
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
