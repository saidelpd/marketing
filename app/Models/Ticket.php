<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = ['user_id', 'raffle_id', 'ticket_number', 'fee', 'discount'];

    /**
     * Return the raffle that this ticket belongs to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Raffle()
    {
        return $this->belongsTo(Raffle::class);
    }

    /**
     * return the user that is the owner of this ticket
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
