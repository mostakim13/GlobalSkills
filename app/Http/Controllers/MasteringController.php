<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasteringController extends Controller
{
  public function index()
  {

    return view('frontend.pages.index');

  }
  public function congrats()
  {

    return view('frontend.pages.congratulations');

  }
}
