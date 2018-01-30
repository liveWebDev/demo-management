<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
  /**
   * Show site main page
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index()
  {
    return view('index-filter');
  }
  
  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function contact()
  {
    return view('contact');
  }
  
  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function faqs()
  {
    return view('faqs');
  }
}