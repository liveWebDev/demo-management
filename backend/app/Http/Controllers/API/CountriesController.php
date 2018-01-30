<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Models\Country;

class CountriesController extends AppBaseController
{


    public function index(Country $country){
        return $this->sendResponse($country->all(), 'Countries information Successfully return!');
    }
}
