<?php

namespace App\Models;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Follow extends Model
{
    use HasFactory;
    
   protected $fillable = [
    'offer_id',
    'news',
    ];

    public function offer(){
        return $this->belongsTo(Offer::class);
    }
}
