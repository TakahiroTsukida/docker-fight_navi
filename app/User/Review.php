<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [
        'user_id',
        'shop_id',
        'total_point',
        'learn',
        'season',
        'merit',
        'demerit',
    ];

    protected $guarded = array('id');

    protected $dates = ['display_date'];

    public static $rules = array(
        'total_point' => 'required|numeric',
        'learn' => 'required',
        'season' => 'required',
        'merit' => 'nullable|max:300',
        'demerit' => 'nullable|max:300',
    );


    public function user() {
        return $this->belongsTo('App\User');
    }

    public function shop() {
        return $this->belongsTo('App\Admin\Shop');
    }
}
