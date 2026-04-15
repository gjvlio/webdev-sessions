<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 

class FrutigerController extends Controller
{
    public function displayFrutiger(){
        return view('frutiger_login');
    }

    public function register(){
        return view('frutiger_register');
    }

    public function addUser(Request $request){
        Log::info($request -> first_name);
        Log::info($request -> middle_name);
        Log::info($request -> last_name);
        Log::info($request -> email);
        Log::info($request -> password);
    }
}
