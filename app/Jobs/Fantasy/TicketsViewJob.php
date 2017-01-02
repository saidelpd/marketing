<?php

namespace App\Jobs\Fantasy;
use App\Models\Raffle;
use App\Models\Ticket;
use Illuminate\Foundation\Auth\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TicketsViewJob implements ShouldQueue
{
    use SerializesModels;
    private $request;
    public $open_raffle;
    public $title;
    public $user;
    public $tickets;
    public $user_list;

    /**
     * Create a new job instance.
     *
     * @param Raffle $raffle
     * @param Request $request
     */
    public function __construct(Raffle $raffle,Request $request)
    {
        $this->title = 'Tickets';
        $this->open_raffle = $raffle;
        $this->user = Auth::user();
        $this->request = $request;
        $this->user_list = collect();
    }

    /**
     * Execute the job.
     * @return $this
     */
    public function handle()
    {
        $this->tickets = Ticket::with([
            'raffle'=>function($r){$r->select('id','obj_name','ticket_cost');},
            'user'=>function($u){$u->select('id','name','last_name');},
            'payment'=>function($p){$p->select('id','billing_id');}
        ]);
         $this->addFilters()->addPermissions();
         $this->tickets =  $this->tickets->paginate(25)->appends(['owner'=>$this->request->owner]);
        return $this;
    }

    /**
     * @return mixed
     */
    protected function addFilters()
    {
        /**
         * Add Filters
         */
        if ($this->request->ticket_number) {
            $this->tickets = $this->tickets->where('ticket_number', $this->request->ticket_number);
        }
        if ($this->request->owner && $this->request->owner != 0) {
            $this->tickets = $this->tickets->where('user_id', $this->request->owner);
        }
        return $this;
    }

    /**
     * Add Permission base on the user login
     */
    protected function addPermissions()
    {
        if (!$this->user->isAdmin()) {
            $this->tickets = $this->tickets->where('user_id', $this->user->id);
        } else {
            $this->user_list = User::orderBy('name')->get(['name', 'last_name', 'id']);
        }
    }


}
