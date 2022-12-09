<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Route::get('/test', [TestController::class, 'index'])->name('index');
// Route::post('/test', [TestController::class, 'store'])->name('store');
// Route::delete('/test', [TestController::class, 'delete'])->name('delete');
// Route::put('/test', [TestController::class, 'update'])->name('update');
