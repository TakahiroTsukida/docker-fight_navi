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


    public function user() {
        return $this->belongsTo('App\User');
    }

    public function shop() {
        return $this->belongsTo('App\Admin\Shop');
    }
}
