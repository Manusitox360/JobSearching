<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OfferApiController;
use App\Http\Controllers\Api\FollowController;


Route::get('/offers', [OfferApiController::class, 'index'])->name('apiHomeOffers');
Route::get('/offers/{id}', [OfferApiController::class, 'show'])->name('apiShowOffer');
Route::post('/offers', [OfferApiController::class, 'store'])->name('apiStoreOffer');
Route::put('/offers/{id}', [OfferApiController::class, 'update'])->name('apiUpdateOffer');
Route::delete('/offers/{id}', [OfferApiController::class, 'destroy'])->name('apiDestroyOffer');

Route::get('/follows', [FollowController::class, 'index'])->name('apiHomeFollows');
Route::get('/follows/{id}', [FollowController::class, 'show'])->name('apiShowFollow');
Route::post('/follows', [FollowController::class, 'store'])->name('apiStoreFollow');
Route::put('/follows/{id}', [FollowController::class, 'update'])->name('apiUpdateFollow');
Route::delete('/follows/{id}', [FollowController::class, 'destroy'])->name('apiDestroyFollow');