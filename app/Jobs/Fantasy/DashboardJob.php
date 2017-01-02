<?php

namespace App\Jobs\Fantasy;

use App\Http\Helpers\HelperClass;
use App\Models\Payments;
use App\Models\Raffle;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class DashboardJob implements ShouldQueue
{
    use SerializesModels;

    public $open_raffle;
    public $title;
    public $user;
    public $total_users;
    public $total_income;
    public $total_payments;
    public $total_tickets;
    public $latest_tickets;

    /**
     * Create a new job instance.
     *
     * @param Raffle $raffle
     */
    public function __construct(Raffle $raffle)
    {
        $this->title = 'Dashboard';
        $this->open_raffle = $raffle;
        $this->user = Auth::user();
        $this->total_tickets = 0;
        $this->total_income = 0;
        $this->total_payments = 0;
        $this->total_users = 0;
        $this->latest_tickets = Ticket::take(15)->orderBy('id', 'Desc');
    }

    /**
     * Execute the job.
     *
     * @return $this
     */
    public function handle()
    {
        if ($this->user->isAdmin()) {
            $this->iniForAdmin();
        } else {
            $this->iniForRegularUsers();
        }
        return $this;
    }

    /**
     * Ini Dashboard For Admin
     */
    private function iniForAdmin()
    {
        $payments = Payments::where('raffle_id', $this->open_raffle->id)
            ->get(['charge_amount', 'fee', 'discount']);
        $this->total_payments = $payments->count();
        $this->total_income = HelperClass::currency($payments->sum('income'));
        $this->total_users = User::count();
        $this->total_tickets = Ticket::where('raffle_id', $this->open_raffle->id)->count();
        $this->latest_tickets = $this->latest_tickets->get();
    }

    /**
     * Ini Dashboard For Regular Users
     */
    private function iniForRegularUsers()
    {
        $this->latest_tickets = $this->latest_tickets->where('user_id', $this->user->id)->get();
    }
}
