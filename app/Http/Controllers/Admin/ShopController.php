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
use App\User\Favorite;
use Carbon\Carbon;
use Storage;

class ShopController extends Controller
{

    public function add ()
    {
        $admin = Admin::find(Auth::user()->id);

        return view('admin.shop.create', ['admin' => $admin]);
    }




    public function create(Request $request)
    {
        $this->validate($request, Shop::$rules);
        $form = $request->all();
        //shopsテーブル保存
        $shop = new Shop;
        $admin = Auth::user();
        $shop->admin_id = $admin->id;
        // imagesテーブル保存
        if (isset($form['image']))
        {
            $path = $request->file('image')->store('public/image/shop_images');
            $shop->image_path = basename($path);
            unset($form['image']);
        }
        $shop->fill($form)->save();
        //shop_typeの中間テーブルに保存
        if (is_array($form['type']))
        {
            foreach ($form['type'] as $key => $value)
            {
                $shop->types()->detach($value);
                $shop->types()->attach($value);
            }
        }
        //pricesテーブルに保存
        foreach ($form['price']['name'] as $key => $value)
        {
            if ($value != null)
            {
                $price = new Price;
                $price->shop_id = $shop->id;
                $price->name = $value;
                $price->price = $form['price']['price'][$key];
                $price->save();
            }
        }
        //personalsテーブルに保存
        foreach ($form['personal']['course'] as $key => $value)
        {
            if ($value != null)
            {
                $personal = new Personal;
                $personal->shop_id = $shop->id;
                $personal->course = $value;
                $personal->time = $form['personal']['time'][$key];
                $personal->price = $form['personal']['price'][$key];
                $personal->save();
            }
        }
        unset($form['_token']);

        session()->flash('flash_message_create', $shop->name.' を新規登録しました');
        return redirect('admin/profile/mypage');
    }






    public function edit(Request $request)
    {
        $shop = Shop::find($request->id);
        if(empty($shop))
        {
           abort(404);
        }
        //他のユーザーの情報の制御
        $admin = Admin::find(Auth::user()->id);
        if ($shop->admin_id != Auth::user()->id)
        {
            session()->flash('flash_message_no_auth', '他のユーザーの編集情報は見れません');
            return redirect('admin/profile/mypage');
        }
        $types = array_column ( $shop->types->toArray() , 'id');
        return view('admin.shop.edit',['shop' => $shop, 'types' => $types]);
    }






    public function update(Request $request)
    {
        $this->validate($request, Shop::$rules);
        $admin = Admin::find(Auth::user()->id);

        $form = $request->all();
        //shopsテーブル保存
        $shop = Shop::find($request->id);
        //他のユーザーの情報の制御
        if ($shop->admin_id != $admin->id)
        {
            session()->flash('flash_message_no_auth', '他のユーザーの編集情報は見れません');
            return redirect('admin/profile/mypage');
        }
        if (isset($form['image']))
        {
            $path = $request->file('image')->store('public/image/shop_images');
            $shop->image_path = basename($path);
            unset($form['image']);
        } elseif (isset($form['remove']))
        {
            $shop->image_path->delete();
            unset($form['remove']);
        }
        $shop->fill($form)->save();
        //shop_typeの中間テーブルに保存
        if (is_array($form['type']))
        {
            foreach ($form['type'] as $key => $value)
            {
                $shop->types()->detach($value);
                $shop->types()->attach($value);
            }
        }
        //pricesテーブルに保存
        Price::where('shop_id', $shop->id)->delete();
        foreach ($form['price']['name'] as $key => $value)
        {
            if ($value != null)
            {
                $price = new Price;
                $price->shop_id = $shop->id;
                $price->name = $value;
                $price->price = $form['price']['price'][$key];
                $price->save();
            }
        }
        //personalsテーブルに保存
        Personal::where('shop_id', $shop->id)->delete();
        foreach ($form['personal']['course'] as $key => $value)
        {
            if ($value != null)
            {
                $personal = new Personal;
                $personal->shop_id = $shop->id;
                $personal->course = $value;
                $personal->time = $form['personal']['time'][$key];
                $personal->price = $form['personal']['price'][$key];
                $personal->save();
            }
        }
        unset($form['_token']);
        session()->flash('flash_message_update', $shop->name.' を更新しました');
        return redirect('admin/profile/mypage');
    }





      public function delete(Request $request)
      {
          $shop = Shop::find($request->id);
          $shop->delete();
          session()->flash('flash_message_delete', $shop->name.' を削除しました');
          return redirect('admin/profile/mypage');
      }
}
