<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\DivisionControllers;
use App\Http\Controllers\WarehouseControllers;

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



Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthControllers::class, 'index'])->name('login');
    Route::post('/login', [AuthControllers::class, 'authenticate']);
});
// Route::get('/', function () {
//     return view('welcome');
// })->middleware('auth');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        $data = [
            "title" => "Dashboard | IMI Tracking",
        ];
        return view('dashboard.index', $data);
    });

    Route::post('/logout', [AuthControllers::class, 'logout']);

    // division
    Route::resource('divisions', DivisionControllers::class);
    Route::get('/datatables/divisions', [DivisionControllers::class, 'datatables']);

    // warehouse
    Route::resource('warehouse', WarehouseControllers::class);
    Route::get('/datatables/warehouse', [WarehouseControllers::class, 'datatables']);
});


