<?php

use App\Http\Controllers\FollowController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/offer/{offer_id}/follows',[FollowController::class,'store()']);