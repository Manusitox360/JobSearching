<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $offers = Offer::with('follows')->get();
        return view('home', compact('offers'));
    }
}