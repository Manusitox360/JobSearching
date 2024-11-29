<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class follow extends Model
{
   protected $fillable = [
    'offer_id',
    'description',
    ];
}
