<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user',
function (Request $request) {
return $request->user();

});
use App\Http\Controllers\SalleController;
Route::middleware('api')->group(function () {
Route::resource('salles', SalleController::class);
});

use App\Http\Controllers\PieceController;
Route::middleware('api')->group(function () {
Route::resource('pieces', PieceController::class);
});
use App\Http\Controllers\SpectacleController;
Route::middleware('api')->group(function () {
Route::resource('spectacles', SpectacleController::class);
});
