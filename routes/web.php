<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalculateController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FallbackController;

Route::get('/', function () {
    return view('welcome');
});

// -------------------- CUSTOM ROUTES ------------------------

Route::get('home', [HomeController::class, 'displayHome']);

Route::get('about', [AboutController::class, 'displayAbout']);

Route::group(['prefix' => 'user'], function(){
    
    Route::get('delete', [UserController::class, 'index']);

    Route::get('pic', [UserController::class, 'userDisplayPic']);

    Route::get('edit/{id}/{name}', [UserController::class, 'userEditIDName'])->name('userEdit');

    Route::get('edit/{id}', [UserController::class, 'userEditID'])->name('userEditID');

    Route::get('{id}/{name}', [UserController::class, 'userInputParam'])->name('userDisplay');

    Route::get('{id}', [UserController::class, 'userInputID'])->name('userID');
});

// -------------------- CALCULATE -------------------------

Route::get('calculate/{num1}/{num2}', [CalculateController::class, 'index'])->name('calculateNums');

// ---------------------------------------------------------

Route::fallback([FallbackController::class, 'displayErrorImage']);





