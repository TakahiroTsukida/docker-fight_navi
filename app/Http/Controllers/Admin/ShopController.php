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
use App\Admin\Open;
use App\User\Favorite;
use Carbon\Carbon;
use Storage;

class ShopController extends Controller
{

    public function add ()
    {
        $admin = Admin::find(Auth::guard('admin')->user()->id);

        return view('admin.shop.create', ['admin' => $admin]);
    }



    public function create(Request $request)
    {
        $this->validate($request, Shop::$rules);
        $form = $request->all();

        //shopsテーブル保存
        $shop = new Shop;
        $shop = Shop::shop_create($form, $shop);

        //shop_typeの中間テーブルに保存
        Type::shop_type_create($form, $shop);

        //pricesテーブルに保存
        Price::prices_create($form, $shop);

        //personalsテーブルに保存
        Personal::personals_create($form, $shop);

        //opensテーブルに保存
        Open::opens_create($form, $shop);

        unset($form['_token']);

        session()->flash('flash_message_create', $shop->name.' を新規登録しました');
        return redirect('admin/profile/mypage');
    }





    public function copy(Request $request) {
        $shop = Shop::find($request->shop_id);

        //shopテーブル複製
        $new_shop = $shop->replicate();
        $new_shop->name = $shop->name."コピー";
        $new_shop->save();

        //shop_type複製
        Type::shop_type_copy($shop, $new_shop);

        //priceテーブル複製
        Price::prices_copy($shop, $new_shop);

        //personalテーブル複製
        Personal::personals_copy($shop, $new_shop);

        //openテーブル複製
        Open::opens_copy($shop, $new_shop);

        session()->flash('flash_message_shop_copy', $shop->name.' を複製しました');
        return redirect('admin/profile/mypage');
    }




    public function edit(Request $request)
    {
        $shop = Shop::find($request->id);

        //shop_idがない場合
        Shop::empty_shop($shop);

        //他のユーザーの情報の更新禁止
        Shop::admin_inspection($shop);

        $types = array_column ( $shop->types->toArray() , 'id');
        return view('admin.shop.edit',['shop' => $shop, 'types' => $types]);
    }




    public function update(Request $request)
    {
        $this->validate($request, Shop::$rules);
        $admin = Admin::find(Auth::guard('admin')->user()->id);

        $form = $request->all();
        $shop = Shop::find($request->id);

        //他のユーザーの情報の更新禁止
        Shop::admin_inspection($shop);

        //shopsテーブル保存
        $shop = Shop::shop_create($form, $shop);

        //shop_typeの中間テーブルに保存
        Type::shop_type_create($form, $shop);

        //pricesテーブルに保存
        Price::where('shop_id', $shop->id)->delete();
        Price::prices_create($form, $shop);


        //personalsテーブルに保存
        Personal::where('shop_id', $shop->id)->delete();
        Personal::personals_create($form, $shop);

        //opensテーブルに保存
        Open::where('shop_id', $shop->id)->delete();
        Open::opens_create($form, $shop);

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
