<?php

use App\Http\Controllers\FibonacciController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fibonacci ', function () {
    return view('fibonacci');
});

Route::get('/information', function () {
    return view('information');
});

Route::post('/start', [FibonacciController::class, 'start'])->name('start');

Route::post('/store', [ProfileController::class, 'store'])->name('store');