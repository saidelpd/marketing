<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Payments extends Model
{
    protected $table = 'payments';

    protected $fillable = ['billing_id', 'raffle_id', 'user_id', 'charge_amount', 'fee', 'discount', 'tickets_buy'];

    protected $appends = ['income'];

    protected $hidden = ['income'];

    /**
     * return real income
     * @param $value
     * @return int|mixed
     */
    public function getIncomeAttribute($value)
    {
        if ($this->charge_amount !== null && $this->fee !== null && $this->discount !== null )
            return $this->charge_amount - $this->fee - $this->discount;
        return 0;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function raffle()
    {
      return $this->belongsTo(Raffle::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class,'payment_id');
    }
}
