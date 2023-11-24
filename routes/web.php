<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Session;
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
})->name('register');

Route::any('login',[UsersController::class,'login'])->name('login');
Route::any('home',function(){
    return view('welcome');
})->name('home');

Route::any('logout',function(){
    auth()->logout();
    Session::flash('success','User successfully logged out');
    return redirect()->route('login');
})->name('logout');
