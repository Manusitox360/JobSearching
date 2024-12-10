<?php

namespace App\Http\Controllers\Api;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Follow;
use Illuminate\Database\Eloquent\Casts\Json;
use Symfony\Contracts\Service\Attribute\Required;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $follows = Follow::all();
        return response()->json($follows, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $offer_id)
    {
        //
        $validated = $request->validate([
            'news' =>'Required|array'
            ]);
                $offer = Offer::find($offer_id);
            
                if (!$offer) {
                  return response()->json([
                     'message' => 'La oferta no existe'
                  ], 404);
                }

                 $followsData = collect($validated['news'])->map(function ($newsItem) use ($offer) {
                 return [
                       'offer_id' => $offer->id,
                       'news' =>  $newsItem,
                    ];
                });
                

                $offer->follows()->createMany($followsData);

                return response()->json([
                    'message' => 'Las novedades han sido añadidas correctamente',
                    'offer' => $offer->load('follows'),
                    ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $follow = Offer::with('follows')->findOrFail($id);
        return response()->json($follow, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
