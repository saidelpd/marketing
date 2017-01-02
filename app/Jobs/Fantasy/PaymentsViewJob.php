<?php

namespace App\Jobs\Fantasy;

use App\Models\Payments;
use App\Models\Raffle;
use Illuminate\Foundation\Auth\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PaymentsViewJob implements ShouldQueue
{
    use SerializesModels;
    private $request;
    public $open_raffle;
    public $title;
    public $user;
    public $payments;
    public $user_list;

    /**
     * Create a new job instance.
     *
     * @param Raffle $raffle
     * @param Request $request
     */
    public function __construct(Raffle $raffle, Request $request)
    {
        $this->title = 'Payments';
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
        $this->payments = Payments::with([
            'raffle' => function ($r) {
                $r->select('id', 'obj_name', 'ticket_cost');
            },
            'user' => function ($u) {
                $u->select('id', 'name', 'last_name');
            },
            'tickets' => function ($p) {
                $p->select('id', 'ticket_number', 'payment_id');
            }
        ]);
        $this->addFilters()->addPermissions();
        $this->payments = $this->payments->paginate(25)->appends(['owner' => $this->request->owner]);
        return $this;
    }

    /**
     * Add Filters
     * @return mixed
     */
    protected function addFilters()
    {
        if ($this->request->payment_id) {
            $this->payments = $this->payments->where('billing_id', $this->request->payment_id);
        }
        if ($this->request->owner && $this->request->owner != 0) {
            $this->payments = $this->payments->where('user_id', $this->request->owner);
        }
        return $this;
    }

    /**
     * Add Permission base on the user login
     */
    protected function addPermissions()
    {
        if (!$this->user->isAdmin()) {
            $this->payments = $this->payments->where('user_id', $this->user->id);
        } else {
            $this->user_list = User::orderBy('name')->get(['name', 'last_name', 'id']);
        }
    }


}
