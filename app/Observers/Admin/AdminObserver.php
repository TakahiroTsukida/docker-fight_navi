<?php

namespace App\Observers\Admin;

use App\Admin\Admin;

class AdminObserver
{
    /**
     * Handle the admin "created" event.
     *
     * @param  \App\Admin\Admin  $admin
     * @return void
     */
    public function created(Admin $admin)
    {
        //
    }

    /**
     * Handle the admin "updated" event.
     *
     * @param  \App\Admin\Admin  $admin
     * @return void
     */
    public function updated(Admin $admin)
    {
        //
    }


    public function deleting(Admin $admin)
    {
        $admin->shops()->each(function ($shop)
        {
            $shop->delete();
        });
    }

    /**
     * Handle the admin "deleted" event.
     *
     * @param  \App\Admin\Admin  $admin
     * @return void
     */
    public function deleted(Admin $admin)
    {
        //
    }

    /**
     * Handle the admin "restored" event.
     *
     * @param  \App\Admin\Admin  $admin
     * @return void
     */
    public function restored(Admin $admin)
    {
        //
    }

    /**
     * Handle the admin "force deleted" event.
     *
     * @param  \App\Admin\Admin  $admin
     * @return void
     */
    public function forceDeleted(Admin $admin)
    {
        //
    }
}
