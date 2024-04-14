<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;

 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('home', 'dashboard');

Route::get('/auth', [AuthController::class, 'index'])->name('login')->middleware('guest');

Route::get('/auth/redirect', [AuthController::class, 'redirect'])->middleware('guest');
 
Route::get('/auth/callback', [AuthController::class, 'callback'])->middleware('guest');

Route::get('/auth/logout', [AuthController::class, 'logout']);


Route::prefix('dashboard')->middleware('auth')->group(
    function(){
       Route::get('/', [PageController::class, 'index']);
       Route::resource('mainpage', PageController::class);
    }
);
