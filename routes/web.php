<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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


Route::get('/actualevent', [OrderController::class, 'index']);
Route::get('/actualevent/reservation', [OrderController::class, 'reservation']);
Route::post('/actualevent/reservation', [OrderController::class, 'reservation_save']);


Route::get('/eventdata/seats', [OrderController::class, 'geteventdata']);
Route::post('/eventdata/tmp_reservation', [OrderController::class, 'set_tmp_reservation']);
Route::get('/eventdata/delaftertime', [OrderController::class, 'destroyUnOrdered']);
Route::get('/eventdata/forcedel2seats', [OrderController::class, 'destroyTwoSeats']);

