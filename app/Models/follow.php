<?php

namespace App\Models;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Follow extends Model
{
   protected $fillable = [
    'offer_id',
    'description',
    ];

    public function offer(){
        return $this->belongsTo(Offer::class);
    }
}
