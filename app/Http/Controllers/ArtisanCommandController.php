<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanCommandController extends Controller
{
    public function index()
    {
       return Artisan::call('optimize:clear');
    }
    public function routeCache(){
        return Artisan::call('route:cache');
    }
}
