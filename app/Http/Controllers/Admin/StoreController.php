<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin\Admin;
use App\Admin\Store;
use App\Admin\Type;
use App\Admin\Price;
use App\Admin\Personal;
use App\Admin\Image;
use Carbon\Carbon;
use Storage;

class StoreController extends Controller
{
  public function add () {
      $admin = Admin::find(Auth::user()->id);

      return view('admin.store.create', ['admin' => $admin]);
  }

  public function create(Request $request) {
    //  $this->validate($request, Store::$rules);
    //  dd($request);
      $store = new Store;

      $form = $request->all();

      //storesテーブル保存
      $admin = Auth::user();
      $store->admin_id = $admin->id;
      $store->name = $form['name'];
      $store->tel = $form['tel'];
      $store->address_number = $form['address_number'];
      $store->address_ken = $form['address_ken'];
      $store->address_city = $form['address_city'];
      $store->open = $form['open'];
      $store->close = $form['close'];
      $store->web = $form['web'];
      $store->description = $form['description'];
      $store->save();

      //imagesテーブル保存
      if (isset($form['image'])) {
          $image = new Image;
          $path = $request->file('image')->store('public/image/store_images');
          $image->image_path = basename($path);
          $image->save();
      }

      //store_typeの中間テーブルに保存
      if (is_array($form->type)) {
            $admin = Auth::user();
            $admin->type()->detach();
            $admin->type()->attach($form->type);
      }

      //pricesテーブルに保存
      foreach ($form->price['name'] as $key => $value) {
          if ($value != null) {
              $price = new Price;
              $price->name = $value;
              $price->price = $form->price['price'][$key];
              dd($price);
              $price->save();
          }
      }

      //personalsテーブルに保存
      foreach ($form->personal['course'] as $key => $value) {
          if ($value != null) {
              $personal = new Personal;
              $personal->course = $value;
              $personal->time = $form->personal['time'][$key];
              $personal->price = $form->personal['price'][$key];
              dd($price);
              $personal->save();
          }
      }


      unset($form['_token']);
      unset($form['image']);


      return view('admin.profile.mypage');
  }
}
