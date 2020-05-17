<?php

namespace App\Observers\User;

use App\User;
use App\Admin\Shop;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    public function deleting(User $user)
    {
        $user->reviews()->each(function ($review)
        {
            $shop = Shop::find($review->shop_id);
            $review->delete();
            if (count($shop->reviews) >= 1)
            {
                $reviews = $shop->reviews->toArray();
                $point = array_sum(array_column($reviews, 'total_point')) / count(array_column($reviews, 'total_point'));
                $reviews_count = count($reviews);
                $shop->point = $point;
                $shop->reviews_count = $reviews_count;
                $shop->save();
            } else {
                $shop->point = null;
                $shop->reviews_count = 0;
                $shop->save();
            }
        });

        $user->favorites()->each(function ($favorite)
        {
            $shop = Shop::find($favorite->shop_id);
            $favorite->delete();
            if (isset($shop->favorites))
            {
                $favorites = $shop->favorites->toArray();
                $favorites_count = count($favorites);
                $shop->favorites_count = $favorites_count;
                $shop->save();
            } else
            {
                $shop->favorites_count = 0;
                $shop->save();
            }

        });
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
