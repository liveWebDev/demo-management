<?php
/**
 * For All ajax calls on frontend
 */
namespace App\Http\Controllers;

class AjaxController extends Controller
{
  
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