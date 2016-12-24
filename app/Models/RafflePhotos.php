<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RafflePhotos extends Model
{
    protected $table = 'raffle_photos';
    protected $fillable = ['raffle_id','title','description','path'];
}
