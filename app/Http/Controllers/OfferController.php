<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$offers = offer::get();
        $offers = Offer::get();
        return view('home', compact('offers'));
    }

    public function show(offer $offer, $id)
    {
        //
        $offer= Offer::findOrFail($id);
        return view('show', compact('offer'));
    }
}
