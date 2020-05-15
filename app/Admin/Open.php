<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Open extends Model
{
    protected $fillable = [
        'day',
        'time',
    ];

    protected $guarded = array('id');

    public static $rules = array(
        'day' => 'required',
        'time' => 'required',
    );


    public function shop()
    {
        return $this->belongsTo('App\Admin\Shop');
    }
}
