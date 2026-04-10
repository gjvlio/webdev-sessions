<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FallbackController extends Controller
{
    public function displayErrorImage(){
        $imagePath = base_path('resources/images/yum.jpg');
            return response()->file($imagePath);
    }
}
