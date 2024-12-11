<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Offer extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'info',
        'company',
        'logo',
        'state',

    ];


    public function follows(): HasMany
    {
        return $this->hasMany(Follow::class);
    }

    public function convertBooleanToText()
    {
        return $this->state ? 'In Progress' : 'Finished';
    }
}
