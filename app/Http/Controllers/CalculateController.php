<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Utils;
use Illuminate\Support\Facades\Log; //Import to use logging in Laravel

class CalculateController extends Controller
{
    //Moved every operation logic from CalculateController -> Utils
    public function index($num1, $num2){
        // Used to log all changes in the code as it runs (backend)
        Log::info('======================= START Index Function ==========================');
        // Detailed information, typically useful only for devs 
        Log::debug('======================= START Index Function =========================='); 
        $utils = new Utils();

      //dd('IHH ISTAPH'); // Stops the code for running (for debugging purposes)

        $sum = $utils->addNumbers($num1, $num2);
        Log::info('Initated $sum from $utils to get addNumbers');
        Log::info('Sum = ' . $sum);
        
        $difference = $utils->subtractNumbers($num1, $num2);
        Log::info('Initated $difference from $utils to get subtractNumbers');
        Log::info('Difference = ' . $difference);
        
        $product = $utils->multiplyNumbers($num1, $num2);
        Log::info('Initated $product from $utils to get multiplyNumbers');
        Log::info('Product = ' . $product);

        $quotient = $utils->divideNumbers($num1, $num2);
        Log::info('Initated $quotient from $utils to get divideNumbers');
        Log::info('Quotient = ' . $quotient);

        Log::info('Returned using view("calculate"), compacting every necessary variables');
        Log::info('======================= END Index Function ==========================');
        return view('calculate', compact('num1', 'num2', 'sum', 'difference', 'product', 'quotient'));
    }
}


