<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
    );


    //shop_typeテーブル保存
    public static function shop_type_create($form, $shop)
    {
      if (is_array($form['type']))
      {
        $shop->types()->detach();

        foreach ($form['type'] as $key => $value)
        {
            $shop->types()->attach($value);
        }
      }
    }


    //shop_typeテーブル複製
    public static function shop_type_copy($shop, $new_shop)
    {
        if (isset($shop->types))
        {
            $shop_type = $shop->types->toArray();
            $shop_type = array_column( $shop_type, 'id');
        }

        if (isset($shop_type))
        {
            foreach ($shop_type as $key => $value)
            {
                $new_shop->types()->attach($value);
            }
        }
    }




    public function shops()
    {
        return $this->belongsToMany('App\Admin\Shop');
    }
}
