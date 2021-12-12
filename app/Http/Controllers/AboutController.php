<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
  public function index()
  {

    return view('frontend.pages.about_us');

  }
  public function certificate()
  {
    return view('certificate');
  }
}
