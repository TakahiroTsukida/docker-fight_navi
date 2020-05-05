<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'shop_id',
    ];


    protected $dates = ['display_date'];

    public static $rules = array(
        'user_id' => 'required|numeric',
        'shop_id' => 'required|numeric',
    );


    public function user() {
        return $this->belongsTo('App\User');
    }

    public function shop() {
        return $this->belongsTo('App\Admin\Shop');
    }
}
