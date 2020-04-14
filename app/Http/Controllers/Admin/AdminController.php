<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin\Admin;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function mypage() {

        $admin = Auth::user();

        return view('admin.profile.mypage', ['admin' => $admin]);
    }

    public function edit() {
        $admin = Auth::user();

        if (empty($admin)) {
            abort(404);
        }

        return view('admin.profile.edit', ['admin' => $admin]);
    }

    public function update(Request $request) {
        $this->validate($request, Admin::$rules);
        $admin = Admin::find(Auth::user()->id);
        $admin_form = $request->all();

        unset($admin_form['_token']);
        $admin->fill($admin_form)->save();


        return redirect('admin/profile/mypage');
    }

}
