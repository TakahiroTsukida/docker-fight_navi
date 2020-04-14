<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
  public function add() {
      return view('user.review.create');
  }

  public function create(Request $request) {




      return redirect('user/store');
  }

  public function edit() {
      return view('user.review.edit');
  }

  public function delete() {
      return view('user.review.delete');
  }
}
