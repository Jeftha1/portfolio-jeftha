<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController; 
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\SignupController; 
use App\Http\Controllers\LogoutController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('profiel');
});

Route::get('motivatie', function(){
    return view('motivatie'); 
}); 

Route::get('logboek', [PostsController::class, 'index']); 

Route::get('removemessage/{id}', [PostsController::class, 'removemessage']); 

Route::post('logboek', [PostsController::class, 'post']); 

Route::get('contact', function(){
    return view('contact'); 
}); 

Route::post('contact', function(){
    return view('contact'); 
}); 

Route::get('signup', [SignupController::class, 'index']); 

Route::post('signup', [SignupController::class, 'signup']); 

Route::get('login', [LoginController::class, 'index'])->name('login'); 

Route::post('login', [LoginController::class, 'login']); 

Route::get('logout', [LogoutController::class, 'logout']); 