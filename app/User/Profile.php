<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'birthday',
        'introduction',
    ];

    protected $guarded = array('id');

    public static $create_rules = array(
        'user_id' => 'unique:profiles',
        'name' => 'nullable|max:30',
        'gender' => 'required',
        'birthday' => 'nullable',
        'introduction' => 'nullable',

        'image' => 'nullable|image|max:512',
    );

    public static $edit_rules = array(
        'name' => 'nullable|max:30',
        'gender' => 'required',
        'birthday' => 'nullable',
        'introduction' => 'nullable',

        'image' => 'nullable|image|max:512',
    );
