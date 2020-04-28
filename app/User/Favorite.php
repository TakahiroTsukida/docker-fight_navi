<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'shop_id',
    ];

    protected $guarded = array('id');

    protected $dates = ['display_date'];

    public static $rules = array(
        'user_id' => 'required|numeric',
        'shop_id' => 'required|numeric',
    );


    public function users() {
        return $this->belongsTo('App\User');
    }

    public function shops() {
        return $this->belongsTo('App\Admin\Shop');
    }
}
