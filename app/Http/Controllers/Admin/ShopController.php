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
use App\User\Favorite;
use Carbon\Carbon;
use Storage;

class ShopController extends Controller
{

    public function add () {
        $admin = Admin::find(Auth::user()->id);

        return view('admin.shop.create', ['admin' => $admin]);
    }




    public function create(Request $request) {
      //dd($request->all());
        $this->validate($request, Shop::$rules);
        $form = $request->all();
        //shopsテーブル保存
        $shop = new Shop;
        $admin = Auth::user();
        $shop->admin_id = $admin->id;
        $shop->name = $form['shop_name'];
        $shop->fill($form)->save();
        // imagesテーブル保存
        if (isset($form['image'])) {
            $image = new Image;
            $path = $request->file('image')->store('public/image/store_images');
            $image->image_path = basename($path);
            $image->shop_id = $shop->id;
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
                $price->shop_id = $shop->id;
                $price->name = $value;
                $price->price = $form['price']['price'][$key];
                $price->save();
            }
        }
        //personalsテーブルに保存
        foreach ($form['personal']['course'] as $key => $value) {
            if ($value != null) {
                $personal = new Personal;
                $personal->shop_id = $shop->id;
                $personal->course = $value;
                $personal->time = $form['personal']['time'][$key];
                $personal->price = $form['personal']['price'][$key];
                $personal->save();
            }
        }
        unset($form['_token']);
        unset($form['image']);
        return redirect('admin/profile/mypage');
    }





    public function edit(Request $request) {
        $shop = Shop::find($request->id);
        if(empty($shop)) {
           abort(404);
        }
        $types = array_column ( $shop->types->toArray() , 'id');

        return view('admin.shop.edit',['shop' => $shop, 'types' => $types]);
    }






    public function update(Request $request) {
        $this->validate($request, Shop::$rules);
        $form = $request->all();
        //shopsテーブル保存
        $shop = Shop::find($request->id);
        $shop->name = $form['shop_name'];
        $shop->fill($form)->save();
        //imagesテーブル保存
        if (isset($form['image'])) {
            $image = new Image;
            $path = $request->file('image')->store('public/image/store_images');
            $image->image_path = basename($path);
            $image->shop_id = $shop->id;
            $image->save();
        } elseif (isset($request->remove)) {
            $shop_image = $shop->images->first();
            $shop_image->delete();
            unset($form['remove']);
        }
        //shop_typeの中間テーブルに保存
        if (is_array($form['type'])) {
            foreach ($form['type'] as $key => $value) {
                $shop->types()->detach($value);
                $shop->types()->attach($value);
            }
        }
        //pricesテーブルに保存
        Price::where('shop_id', $shop->id)->delete();
        foreach ($form['price']['name'] as $key => $value) {
            if ($value != null) {
                $price = new Price;
                $price->shop_id = $shop->id;
                $price->name = $value;
                $price->price = $form['price']['price'][$key];
                $price->save();
            }
        }
        //personalsテーブルに保存
        Personal::where('shop_id', $shop->id)->delete();
        foreach ($form['personal']['course'] as $key => $value) {
            if ($value != null) {
                $personal = new Personal;
                $personal->shop_id = $shop->id;
                $personal->course = $value;
                $personal->time = $form['personal']['time'][$key];
                $personal->price = $form['personal']['price'][$key];
                $personal->save();
            }
        }
        unset($form['_token']);
        unset($form['image']);
        return redirect('admin/profile/mypage');
    }

      public function delete(Request $request) {
          $shop = Shop::find($request->id);
          // $shop->prices->each->delete();
          // $shop->personals->each->delete();
          $shop->delete();
          return redirect('admin/profile/mypage');
      }
}
