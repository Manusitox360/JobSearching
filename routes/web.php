<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfferController;

Route::get('/', [OfferController::class, 'index'])->name('home');
Route::get('/offers/{id}', [OfferController::class, 'show'])->name('showOffer');
