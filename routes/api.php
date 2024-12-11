<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OfferApiController;
use App\Http\Controllers\Api\FollowApiController;


Route::get('/offers', [OfferApiController::class, 'index'])->name('apiHomeOffers');
Route::get('/offers/{id}', [OfferApiController::class, 'show'])->name('apiShowOffer');
Route::post('/offers', [OfferApiController::class, 'store'])->name('apiStoreOffer');
Route::put('/offers/{id}', [OfferApiController::class, 'update'])->name('apiUpdateOffer');
Route::delete('/offers/{id}', [OfferApiController::class, 'destroy'])->name('apiDestroyOffer');

Route::get('/offers/{offerId}/follows', [FollowApiController::class, 'index'])->name('apiHomeFollows');
Route::get('/offers/{offerId}/follows/{id}', [FollowApiController::class, 'show'])->name('apiShowFollow');
Route::post('/offers/{offerId}/follows', [FollowApiController::class, 'store'])->name('apiStoreFollow');
Route::put('/offers/{offerId}/follows/{id}', [FollowApiController::class, 'update'])->name('apiUpdateFollow');
Route::delete('/offers/{offerId}/follows/{id}', [FollowApiController::class, 'destroy'])->name('apiDestroyFollow');