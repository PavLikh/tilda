<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\SecondController;
use App\Http\Controllers\ThirdController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('ip', function () {
//     $ip = $_SERVER['REMOTE_ADDR'];
//     $data = \Location::get($ip);
//     var_dump($data);
// });

Route::get('/', [FirstController::class, 'index'])->name('first.index');
Route::get('/second', [SecondController::class, 'index'])->name('second.index');
Route::get('/third', [ThirdController::class, 'index'])->name('third.index');
Route::get('/get', [ThirdController::class, 'testIp'])->name('third.testip');