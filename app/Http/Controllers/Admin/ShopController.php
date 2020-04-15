<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin\Admin;
use App\Admin\Shop;
use App\Admin\Type;
use App\Admin\Price;
use App\Admin\Personal;
use App\Admin\Image;
use Carbon\Carbon;
use Storage;

class ShopController extends Controller
{
  public function add () {
      $admin = Admin::find(Auth::user()->id);

      return view('admin.shop.create', ['admin' => $admin]);
  }

  public function create(Request $request) {

      $this->validate($request, Shop::$rules);

      $form = $request->all();

      //shopsテーブル保存
      $shop = new Shop;
      $admin = Auth::user();
      $shop->admin_id = $admin->id;
      $shop->name = $form['name'];
      $shop->tel = $form['tel'];
      $shop->address_number = $form['address_number'];
      $shop->address_ken = $form['address_ken'];
      $shop->address_city = $form['address_city'];
      $shop->open = $form['open'];
      $shop->close = $form['close'];
      $shop->web = $form['web'];
      $shop->description = $form['description'];
      $shop->save();

      //imagesテーブル保存
      if (isset($form['image'])) {
          $image = new Image;
          $path = $request->file('image')->store('public/image/store_images');
          $image->image_path = basename($path);
          dd($image);
          $image->save();
      }


      //shop_typeの中間テーブルに保存
      if (is_array($form['type'])) {
          foreach ($form['type'] as $key => $value) {
              $shop->types()->detach($value);
              $shop->types()->attach($value);
          }
      }

      //pricesテーブルに保存
      foreach ($form['price']['name'] as $key => $value) {
          if ($value != null) {
              $price = new Price;
              $price->name = $value;
              $price->price = $form['price']['price'][$key];
              $price->save();
          }
      }

      //personalsテーブルに保存
      foreach ($form['personal']['course'] as $key => $value) {
          if ($value != null) {
              $personal = new Personal;
              $personal->course = $value;
              $personal->time = $form['personal']['time'][$key];
              $personal->price = $form['personal']['price'][$key];
              $personal->save();
          }
      }


      unset($form['_token']);
      unset($form['image']);


      return view('admin.profile.mypage');
  }
}
