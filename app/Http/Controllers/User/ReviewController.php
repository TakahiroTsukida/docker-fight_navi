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
        $user = Auth::user();
        return view('user.review.create',['shop' => $shop, 'user' => $user]);
    }




    public function create(Request $request)
    {
        $this->validate($request, Review::$rules);
        $user_id = Auth::user()->id;
        //レビューテーブルに保存
        $review = new Review;
        $form = $request->all();
        $review->shop_id = $request->shop_id;
        $review->user_id = $user_id;
        $review->fill($form)->save();

        //shopのレビュー件数、平均点の更新
        $shop = Shop::find($request->shop_id);
        if (count($shop->reviews) >= 1)
        {
            $reviews = $shop->reviews->toArray();
            $point = array_sum(array_column($reviews, 'total_point')) / count(array_column($reviews, 'total_point'));
            $reviews_count = count($reviews);
            $shop->point = round($point, 2);
            $shop->reviews_count = $reviews_count;
            $shop->save();
        } else
        {
            $shop->point = null;
            $shop->reviews_count = 0;
            $shop->save();
        }

        session()->flash('flash_message_review_create', $review->shop->name.' のレビューを作成しました');
        return redirect('user/profile/mypage');
    }




    public function edit(Request $request)
    {
        $review = Review::find($request->review_id);
        if (empty($review))
        {
            session()->flash('flash_message_no_user_auth', '他のユーザーの編集情報は見れません');
            return back();
        }
        if ($review->user_id != Auth::user()->id)
        {
            session()->flash('flash_message_no_user_auth', '他のユーザーの編集情報は見れません');
            return back();
        }
        return view('user.review.edit', ['review' => $review]);
    }



    public function update(Request $request)
    {
          $this->validate($request, Review::$rules);
          $review = Review::find($request->review_id);

          if (empty($review))
          {
              abort(404);
          }
          //ログインしているユーザーかチェック
          if ($review->user_id == Auth::user()->id)
          {
              $form = $request->all();
              $review->fill($form)->save();
          } else
          {
              abort(404);
          }

          //shopのレビュー件数、平均点の更新
          $shop = Shop::find($review->shop_id);
          if (count($shop->reviews) >= 1)
          {
              $reviews = $shop->reviews->toArray();
              $point = array_sum(array_column($reviews, 'total_point')) / count(array_column($reviews, 'total_point'));
              $reviews_count = count($reviews);
              $shop->point = round($point, 2);
              $shop->reviews_count = $reviews_count;
              $shop->save();
          } else
          {
              $shop->point = null;
              $shop->reviews_count = 0;
              $shop->save();
          }
          session()->flash('flash_message_review_update', $review->shop->name.' のレビューを更新しました');
          return redirect('user/profile/mypage');
    }






    public function delete(Request $request)
    {
        $review = Review::find($request->review_id);
        $shop_id = $review->shop_id;
        $review->delete();
        //shopのレビュー件数、平均点の更新
        $shop = Shop::find($shop_id);
        if (count($shop->reviews) >= 1)
        {
            $reviews = $shop->reviews->toArray();
            $point = array_sum(array_column($reviews, 'total_point')) / count(array_column($reviews, 'total_point'));
            $reviews_count = count($reviews);
            $shop->point = $point;
            $shop->reviews_count = $reviews_count;
            $shop->save();
        } else
        {
            $shop->point = null;
            $shop->reviews_count = 0;
            $shop->save();
        }

        session()->flash('flash_message_review_delete', $review->shop->name.' のレビューを削除しました');
        return back()->withInput();
    }
}
