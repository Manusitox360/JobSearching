<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Offer extends Model
{
    //
    Use HasFactory;
    protected $fillable = [
        'date',
        'info',
        'company',
        'logo',
        'state',
        
    ];


    public function follows(){
        return $this->hasMany(Follow::class);
       }
}
