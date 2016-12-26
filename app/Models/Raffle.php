<?php

namespace App\Models;

use App\Http\Helpers\HelperClass;
use Illuminate\Database\Eloquent\Model;

class Raffle extends Model
{
    protected $table = 'raffle';

    protected $fillable = ['prefix', 'obj_name', 'obj_cost', 'ticket_cost', 'raffle_images_path', 'closing_date'];

    protected $dates = ['closing_date'];
    /**
     * Return all photos from this Raffle
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    protected $casts = [
        'ticket_cost' => 'integer',
        'obj_cost' => 'integer'
    ];

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

    /**
     * return the open raffle
     * @param $query
     * @return
     */
    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

    /**
     * return converted to us ticket cost
     * @param bool $coma_separator
     * @return string
     */
    public function ticketCostPrice($coma_separator = true)
    {
        return HelperClass::currency($this->ticket_cost, $coma_separator);
    }


}
