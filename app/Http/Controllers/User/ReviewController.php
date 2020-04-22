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

        return view('user.review.create',['shop' => $shop]);
    }




    public function create(Request $request) {
        // dd($request);
        $this->validate($request, Review::$rules);
        $user_id = Auth::user()->id;

        $review = new Review;
        $form = $request->all();
        $review->shop_id = $request->shop_id;
        $review->user_id = $user_id;
        $review->fill($form)->save();

        return redirect()->route('user.profile.mypage', ['id' => Auth::user()->id]);
    }




    public function edit() {
        return view('user.review.edit');
    }




    public function delete() {
        return view('user.review.delete');
    }
}
