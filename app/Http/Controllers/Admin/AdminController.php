<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Admin\Admin;
use App\Admin\Shop;
use Carbon\Carbon;

class AdminController extends Controller
{


    public function mypage(Request $request)
    {
        $admin = Auth::user();
        $admin_shops = $admin->shops->sortBy('created_at');

        $shops = new LengthAwarePaginator(
            $admin_shops->forPage($request->page, 10),
            count($admin_shops),
            10,
            $request->page,
            array('path' => $request->url())
        );

        return view('admin.profile.mypage', ['admin' => $admin, 'shops' => $shops]);
    }





    public function edit()
    {
        $admin = Auth::user();
        if (empty($admin)) {
            abort(404);
        }
        return view('admin.profile.edit', ['admin' => $admin]);
    }





    public function update(Request $request)
    {
        $this->validate($request, Admin::$rules);
        $admin = Admin::find(Auth::user()->id);
        $admin_form = $request->all();

        unset($admin_form['_token']);
        $admin->fill($admin_form)->save();

        return redirect()->route('admin.profile.mypage');
    }

}
