<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(ProductoController::class)->group(function(){
    Route::get('/productos','index');
    Route::post('/producto','store');
    Route::get('/producto/{id}','show');
    Route::put('/producto/{id}','update');
    Route::delete('/producto/{id}','destroy');
});