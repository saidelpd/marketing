<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raffle extends Model
{
    protected $table = 'raffle';

    protected $fillable = ['prefix','obj_name','obj_cost','ticket_cost','raffle_images_path','closing_date'];

    /**
     * Return all photos from this Raffle
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
       return $this->hasMany(RafflePhotos::class);
    }

    /**
     * Return All tickets from this Raffle
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

}
