<?php
namespace App\Http\Helpers;

use App\Models\Raffle;
use App\Models\Ticket;

/**
 * Created by PhpStorm.
 * User: Saidel
 * Date: 12/19/2016
 * Time: 8:09 PM
 */
class CreateTicketSequence
{
    private $ticket;
    public $has_error;
    public $error_message;

    /**
     * CreateTicketSequence constructor.
     * @param $ticket
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
        $this->has_error = false;
    }

    /**
     * return ticket sequence
     */
    public function getTicketSequence()
    {
        if ($this->ticket->raffle) {
            return $this->ticket->raffle->prefix . str_pad($this->ticket->id, 6, "0", STR_PAD_LEFT);
        }
        $this->has_error = true;
        $this->error_message = 'Invalid Raffle, Please Try Again';
    }


}