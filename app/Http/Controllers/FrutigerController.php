<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $request -> validate([
            'first_name' => ['required', 'min:2'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'ends_with:@iskolarngbayan.pup.edu.ph'],
            'password' => ['required', 'min:8']
        ], [
            'first_name.required' => 'Kailangan mong ilagay sa patlang ang iyong pangalan',
            'first_name.min' => 'Sobrang ikli ng iyong pangalan. Dagdagan mula dalawang letra pataas.',
            'last_name.required' => 'Kailangan mong ilagay sa patlang ang iyong apelyido',
            'email.required' => 'Kailangan mong ilagay sa patlang ang iyong sulatroniko',
            'email.email' => 'Paki-ayos ang pagsusulat ng iyong sulatroniko. Dapat ay mayroong @ sa pagitan ng sulatroniko',
            'email.ends_with' => 'Iskolar ka ba? Paki-lagay sa patlang ang tamang hulihan ng iyong sulatroniko: .iskolarngbayan@pup.edu.ph',
            'password.required' => 'Kailangan mong ilagay sa patlang ang iyong salitang lihim',
        ]);

        Log::info($request -> first_name);
        Log::info($request -> middle_name);
        Log::info($request -> last_name);
        Log::info($request -> email);
        Log::info($request -> password);
        
        $result = DB::table('users')->get();
        return $result;
    }
}
