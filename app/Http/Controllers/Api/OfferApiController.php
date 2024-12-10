<?php

namespace App\Http\Controllers\Api;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::all();
        return response()->json($offers, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $offer = Offer::create([
            'info' => $request->info,
            'company' => $request->company,
            'logo' => $request->logo,
            'state' => $request->state, 
         ]);
 
         $offer->save();
 
         return response()->json($offer, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $offer = Offer::with('follows')->findOrFail($id);
        return response()->json($offer, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
