<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('apartments', [ApartmentController::class, 'index']);
Route::get('apartments-summary', [ApartmentController::class, 'listApartmentsSummary']);
Route::post('apartment', [ApartmentController::class, 'show']);

Route::post('rooms', [RoomController::class, 'index']);
Route::post('room', [RoomController::class, 'show']);

Route::get('explores', [ExploreController::class, 'index']);

Route::post('mail/send', [ContactController::class, 'send']);