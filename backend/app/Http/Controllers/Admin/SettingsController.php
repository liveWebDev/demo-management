<?php

namespace App\Http\Controllers\Admin;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Criteria\MyCriteria;
use Auth;
use Flash;
use App\Models\Country;

class SettingsController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $settings = GeneralSetting::where('user_id', \Auth::user()->id)->first();
      $settings = json_decode((isset($settings) ? $settings->setting_value : ''));
      
      $countries = Country::orderBy('country_name')->pluck('country_name', 'id');
      return view('admin.settings.index', compact('settings', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input = $request->all();
      $settings = GeneralSetting::where('user_id', \Auth::user()->id)->first();
      if (empty($settings)) {
        GeneralSetting::create(['user_id' => \Auth::user()->id,
          'setting_key'=> 'car_settings',
          'setting_value' => json_encode($input)]);
        Flash::success('Settings saved successfully.');
      }else{
        $settings->setting_value = json_encode($input);
        $settings->save();
        Flash::success('Settings successfully updated.');
      }
      
      return redirect(route('admin.settings.index'));
    }
}
