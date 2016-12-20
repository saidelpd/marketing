<?php

namespace App\Listeners;

use App\Events\TicketsEvent;
use App\Http\Helpers\CreateTicketSequence;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketsListener
{
    private $ticket;
    /**
     * Handle the event.
     *
     * @param  TicketsEvent  $event
     * @return void
     */
    public function handle(TicketsEvent $event)
    {
        $this->ticket = $event->ticket;
        $this->{$event->type}();
    }

    /**
     * trigger when the ticket is created
     */
    public function created()
    {
        /**
         * Add Ticket Number
         */
      $ticket_number = new CreateTicketSequence($this->ticket);
       if (!$ticket_number->has_error)
       {
           $this->ticket->ticket_number = $ticket_number->getTicketSequence();
           $this->ticket->save();
       }
    }
}
