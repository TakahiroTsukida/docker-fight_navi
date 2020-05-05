<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Admin\Shop;
use App\User\Review;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function add(Request $request) {
        $shop = Shop::find($request->id);

        if (empty($shop)) {
            return view('top');
        }
        $user = Auth::user();
        return view('user.review.create',['shop' => $shop, 'user' => $user]);
    }




    public function create(Request $request) {
        $this->validate($request, Review::$rules);
        $user_id = Auth::user()->id;

        $review = new Review;
        $form = $request->all();
        $review->shop_id = $request->shop_id;
        $review->user_id = $user_id;
        $review->fill($form)->save();

        return redirect('user/profile/mypage');
    }




    public function edit(Request $request) {
        $review = Review::find($request->review_id);
        $shop = Shop::find($request->shop_id);

        return view('user.review.edit', ['review' => $review, 'shop' => $shop]);
    }



    public function update(Request $request) {
          $this->validate($request, Review::$rules);
          $review = Review::find($request->review_id);
          $form = $request->all();

          $review->fill($form)->save();

          return redirect('user/profile/mypage');
    }




    public function delete(Request $request) {
        $review = Review::find($request->review_id);
        $review->delete();


       return back()->withInput(); //redirect('user/profile/mypage');
    }
}
