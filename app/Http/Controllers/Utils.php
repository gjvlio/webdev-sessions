<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 

class Utils extends Controller
{
    // Moved operations from CalculateController -> Utils
    public function addNumbers($param1, $param2){
    Log::info('::::::::::::::: START addNumbers :::::::::::::::');
    Log::info('Returned param1 + param2');
    Log::info('::::::::::::::: END addNumbers :::::::::::::::');
        return $param1 + $param2;
    }

    public function subtractNumbers($param1, $param2){
    Log::info('::::::::::::::: START subtractNumbers :::::::::::::::');
    Log::info('Returned param1 - param2');
    Log::info('::::::::::::::: END subtractNumbers :::::::::::::::');
        return $param1 - $param2;
    }

    public function multiplyNumbers($param1, $param2){
    Log::info('::::::::::::::: START multiplyNumbers :::::::::::::::');
    Log::info('Returned param1 * param2');
    Log::info('::::::::::::::: END multiplyNumbers :::::::::::::::');
        return $param1 * $param2;
    }

    public function divideNumbers($param1, $param2){
    Log::info('::::::::::::::: START addNumber :::::::::::::::');
    
        if ($param2 == 0){
            Log::error('param2 (denominator) is undefined');
            Log::info('::::::::::::::: END divideNumber :::::::::::::::');
            return "Undefined";
        } else {
            Log::info('Returned param1 / param2');
            Log::info('::::::::::::::: END divideNumber :::::::::::::::');
            return $param1 / $param2;
        }
    }
}
