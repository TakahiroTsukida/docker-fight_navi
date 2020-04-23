<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [
        'shop_id',
        'resson',
        'price',
        'clean',
        'service',
        'atmosphere',
        'merit',
        'demerit',
    ];

    protected $guarded = array('id');

    protected $dates = ['display_date'];

    public static $rules = array(
        'resson' => 'required|numeric',
        'price' => 'required|numeric',
        'clean' => 'required|numeric',
        'service' => 'required|numeric',
        'atmosphere' => 'required|numeric',
        'merit' => 'nullable|max:300',
        'demerit' => 'nullable|max:300',
    );


    public function users() {
        return $this->belongsTo('App\User');
    }

    public function shops() {
        return $this->belongsTo('App\Admin\Shop');
    }
}
