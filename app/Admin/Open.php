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


    public static function opens_create($form, $shop)
    {
        foreach ($form['open']['day'] as $key => $value)
        {
            if ($value != null)
            {
                $open = new Open;
                $open->shop_id = $shop->id;
                $open->day = $value;
                $open->time = $form['open']['time'][$key];
                $open->save();
            }
        }
    }

    public function shop()
    {
        return $this->belongsTo('App\Admin\Shop');
    }
}
