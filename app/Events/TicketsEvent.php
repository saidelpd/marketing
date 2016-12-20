<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TicketsEvent
{
    use InteractsWithSockets, SerializesModels;

    public $ticket;
    public $type;

    /**
     * Create a new event instance.
     * @param $ticket
     * @param $type
     */
    public function __construct($ticket,$type)
    {
        $this->ticket = $ticket;
        $this->type = $type;
    }

}
