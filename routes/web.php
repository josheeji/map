<?php

use App\Http\Controllers\MapController;
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
    return view('layouts.app');
});

Route::prefix('admin/maps')->group(function(){
    Route::get('/', [MapController::class, 'create']);
    Route::post('/', [MapController::class, 'store']);
    // Route::get('/create', [MapController::class, 'create']);
});
