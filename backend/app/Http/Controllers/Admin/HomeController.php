<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Traits\Common;

class HomeController extends Controller
{
    use Common;

    /**
     * @return view
     */
    public function login()
    {
        if (Auth::check()) {
          if (Auth::user()->isRole('admin')){
            return redirect('/admin/users');
          }elseif (Auth::user()->isRole('manager|owner')){
            return redirect('/admin/cars');
          }elseif (Auth::user()->isRole('agent')){
            return redirect('/admin/tickets');
          }else{
            return redirect('/');
          }
        }
        return view('admin.login');
    }

    /**
     * User login from email and password.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirect
     */
    public function postLogin(Request $request)
    {
        $email = $request->get("email");
        $password = $request->get("password");
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
          if (Auth::user()->isRole('admin')){
            return redirect('/admin/users');
          }elseif (Auth::user()->isRole('manager|owner')){
            return redirect('/admin/cars');
          }else{
            return redirect('/');
          }
        } else {
            Session::flash("failed", "Invalid Email/Password");
            return redirect()->back();
        }
    }

    /**
     * User logout.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirect
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function test()
    {
        d(self::getDateForSpecificDayBetweenDates('2017-02-01', '2017-05-28', 5));
        $schedule = [
            'start' => '2015-11-17 09:00:00',
            'end' => '2015-11-18 10:00:00'
        ];
        $arr = self::makeTimeSlotsArr($schedule);
        d($arr);
    }
}