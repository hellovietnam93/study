<?php

namespace studyhub\Http\Controllers;

class HomeController extends Controller
{
  public function home() {
    return view('pages.home');
  }
}
