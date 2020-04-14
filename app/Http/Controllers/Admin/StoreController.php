<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin\Admin;
use App\Admin\Store;
use Carbon\Carbon;
use Storage;

class StoreController extends Controller
{
  public function add () {
      $admin = Admin::find(Auth::user()->id);

      return view('admin.store.create', ['admin' => $admin]);
  }

  public function create(Request $request) {
      dd($request);
      $this->validate($request, Store::$rules);

      $store = new Store;
      $form = $request->all();

      if (isset($form['image'])) {
          $path = $request->file('image')->store('public/image');
          $store->image_path = basename($path);
      } else {
          $store->image_path = null;
      }

      unset($form['_token']);
      unset($form['image']);

      $store->fill($form);
      $store->save();


      return view('top');
  }
}
