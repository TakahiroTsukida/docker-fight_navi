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



    //openテーブル作成
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


    //openテーブル複製
    public static function opens_copy($shop, $new_shop)
    {
        if (isset($shop->opens))
        {
            $opens = $shop->opens;

            foreach ($opens as $open) {
                $new_open = New Open;
                $new_open->shop_id = $new_shop->id;
                $new_open->day = $open->day;
                $new_open->time = $open->time;
                $new_open->save();
            }
        }
    }





    public function shop()
    {
        return $this->belongsTo('App\Admin\Shop');
    }
}
