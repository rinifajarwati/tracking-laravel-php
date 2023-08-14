<?php

use App\Http\Controllers\AuthControllers;
use Illuminate\Support\Facades\Route;

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



Route::middleware(['guest'])->group(function (){
Route::get('/login', [AuthControllers::class, 'index'])->name('login');
Route::post('/login', [AuthControllers::class, 'authentocate']);
});
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::post('/logout', [AuthControllers::class, 'logout']);
