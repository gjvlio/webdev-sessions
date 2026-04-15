<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrutigerController extends Controller
{
    public function displayFrutiger(){
        return view('frutiger');
    }
}
