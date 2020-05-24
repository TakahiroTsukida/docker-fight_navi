<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\User\VerifyEmailCustom;
use App\Notifications\User\CustomPasswordReset;
use App\Admin\Shop;

class User extends Authenticatable //implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'birthday',
        'introduction',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required|max:60',
        'gender' => 'nullable',
        'birthday' => 'nullable|before:now',
        'introduction' => 'nullable',

        'image' => 'nullable|image|max:1024',
    );


    // public function sendEmailVerificationNotification()
    // {
    //     $this->notify(new VerifyEmailCustom);
    // }
    //
    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new CustomPasswordReset($token));
    // }


    public static function user_profile_create($form, $user)
    {
        if(empty($user))
        {
            abort(404);
        }

        if (isset($form['secret_gender']))
        {
            $user->secret_gender = 1;
        } else {
            $user->secret_gender = null;
        }

        if (isset($form['secret_birthday']))
        {
            $user->secret_birthday = 1;
        } else {
            $user->secret_birthday = null;
        }

        if (isset($form['image']))
        {
            $path = $form['image']->store('public/image/profile_images');
            $user->image_path = basename($path);
            unset($form['image']);
        } elseif (isset($form['remove']))
        {
            $user->image_path = null;
            unset($form['remove']);
        }        
        $user->fill($form)->save();
    }



    public function reviews() {
        return $this->hasMany('App\User\Review');
    }

    public function favorites() {
        return $this->hasMany('App\User\Favorite');
    }
}
