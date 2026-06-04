<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalculateController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\FrutigerRegisterController;
use App\Http\Controllers\FrutigerPostController;
use App\Http\Controllers\PlaygroundController;

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

// -------------------- FRUTIGER -------------------------

Route::group(['prefix' => 'frutiger'], function(){

    Route::get('/', [FrutigerRegisterController::class, 'displayFrutiger'])->name('displayMain');
    Route::get('register', [FrutigerRegisterController::class, 'displayRegister'])->name('displayRegister');
    Route::post('registerUser', [FrutigerRegisterController::class, 'addUser'])->name('addUser');

});

Route::group(['prefix' => 'frutiger'], function(){

    Route::get('post', [FrutigerPostController::class, 'displayPost'])->name('displayPost');
    Route::post('addPost', [FrutigerPostController::class, 'addPost'])->name('addPost');

    Route::get('edit/{id}', [FrutigerPostController::class, 'editForm'])->name('editForm');
    Route::post('edit/{id}', [FrutigerPostController::class, 'editSubmit'])->name('editSubmit');


});

// -------------------- SANDBOX -------------------------

Route::get('play', [PlaygroundController::class, 'display'])->name('sandbox');

// ---------------------------------------------------------

Route::fallback([FallbackController::class, 'displayErrorImage']);





