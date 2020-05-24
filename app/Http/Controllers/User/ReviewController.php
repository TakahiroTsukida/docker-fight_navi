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
    public function add(Request $request)
    {
        $shop = Shop::find($request->id);

        if (empty($shop))
        {
            return view('top');
        }
        $user = Auth::guard('user')->user();
        return view('user.review.create',['shop' => $shop, 'user' => $user]);
    }






    public function create(Request $request)
    {
        $this->validate($request, Review::$rules);
        $form = $request->all();
        
        //レビューテーブルに保存        
        $review = new Review;
        $review = Review::review_create($form, $review);        

        //shopのレビュー件数、平均点の更新
        $shop = Shop::find($form['shop_id']);
        Review::shop_reviews($shop);

        session()->flash('flash_message_review_create', $review->shop->name.' のレビューを作成しました');
        return redirect()->route('user.shop', ['id' => $shop->id]);
        // return redirect('user/profile/mypage');
    }






    public function edit(Request $request)
    {
        $review = Review::find($request->review_id);
        if (empty($review))
        {
            session()->flash('flash_message_no_user_auth', '他のユーザーの編集情報は見れません');
            return back();
        }
        if ($review->user_id != Auth::guard('user')->user()->id)
        {
            session()->flash('flash_message_no_user_auth', '他のユーザーの編集情報は見れません');
            return back();
        }
        return view('user.review.edit', ['review' => $review]);
    }







    public function update(Request $request)
    {
          $this->validate($request, Review::$rules);
          $form = $request->all();
          $review = Review::find($request->review_id);

          //ログインしているユーザーかチェック
          if ($review->user_id == Auth::guard('user')->user()->id || empty($review))
            {
                Review::review_create($form, $review);
            } else
            {
                abort(404);
            }

          //shopのレビュー件数、平均点の更新
          $shop = Shop::find($review->shop_id);
          Review::shop_reviews($shop);

          session()->flash('flash_message_review_update', $review->shop->name.' のレビューを更新しました');
          return redirect()->route('user.shop', ['id' => $shop->id]);
          // return redirect('user/profile/mypage');
    }

    





    public function delete(Request $request)
    {
        $review = Review::find($request->review_id);
        $shop_id = $review->shop_id;
        $review->delete();

        //shopのレビュー件数、平均点の更新
        $shop = Shop::find($shop_id);
        Review::shop_reviews($shop);

        session()->flash('flash_message_review_delete', $review->shop->name.' のレビューを削除しました');
        return back()->withInput();
    }
}
