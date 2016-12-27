<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = ['user_id', 'payment_id', 'raffle_id', 'ticket_number'];

    /**
     * Return the raffle that this ticket belongs to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function raffle()
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

    /**
     * return the payment that is the owner of this ticket
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment()
    {
      return $this->belongsTo(Payments::class,'payment_id');
    }

    /**
     * return label with colors for status
     */
    public function getStatusLabel()
    {
        switch ($this->status) {
            case 'pending':
                return "<span title='Status' class='label label-warning'>Pending</span>";
                break;
            case 'not a winner':
                return "<span title='Status' class='label label-danger'>Not a Winner</span>";
                break;
            case 'winner':
                return "<span title='Status' class='label label-success'>Winner</span>";
                break;
            default:
                return '';
                break;
        }
    }
}
