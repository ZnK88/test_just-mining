<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
// use GuzzleHttp\Client;
use Illuminate\Support\Facade\Http;

class IndexController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        else{
            return view('index');
        }
    }
}
