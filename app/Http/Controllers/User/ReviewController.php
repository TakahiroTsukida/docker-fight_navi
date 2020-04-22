<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Shop;

class ReviewController extends Controller
{
  public function add(Request $request) {
      $shop = Shop::find($request->id);

      if (empty($shop)) {
          abort(404);
      }

      return view('user.review.create',[
          'shop' => $shop,
      ]);
  }

  public function create(Request $request) {
      



      return redirect('user/store');
  }

  public function edit() {
      return view('user.review.edit');
  }

  public function delete() {
      return view('user.review.delete');
  }
}
