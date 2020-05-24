<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{

    protected $fillable = [
        'user_id',
        'shop_id',
        'total_point',
        'learn',
        'season_begin',
        'season_end',
        'merit',
        'demerit',
    ];

    protected $guarded = array('id');

    protected $dates = ['display_date'];

    public static $rules = array(
        'secret_name' => 'nullable',
        'total_point' => 'required|numeric',
        'learn' => 'required',
        'season_begin' => 'required',
        'season_end' => 'nullable',
        'merit' => 'nullable|max:300',
        'demerit' => 'nullable|max:300',
    );




    public static function review_create($form, $review)
    {
        $review->shop_id = $form['shop_id'];
        $review->user_id = Auth::guard('user')->user()->id;
        if (isset($form['secret_name']))
        {
            $review->secret_name = $form['secret_name'];
        } else
        {
            $review->secret_name = null;
        }
        $review->fill($form)->save();
        return $review;
    }




    public static function shop_reviews($shop)
    {
        if (count($shop->reviews) >= 1)
        {
            $reviews = $shop->reviews->toArray();
            $point = array_sum(array_column($reviews, 'total_point')) / count(array_column($reviews, 'total_point'));
            $reviews_count = count($reviews);
            $shop->point = round($point, 2);
            $shop->reviews_count = $reviews_count;
            $shop->save();
        } else {
            $shop->point = null;
            $shop->reviews_count = 0;
            $shop->save();
        }
    }




    public function user() {
        return $this->belongsTo('App\User');
    }

    public function shop() {
        return $this->belongsTo('App\Admin\Shop');
    }
}
