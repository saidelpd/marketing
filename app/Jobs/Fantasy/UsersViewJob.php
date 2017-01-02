<?php

namespace App\Jobs\Fantasy;

use App\Models\Raffle;
use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersViewJob implements ShouldQueue
{
    use SerializesModels;
    private $first_name;
    private $last_name;
    private $appends;
    public $open_raffle;
    public $title;
    public $tickets;
    public $users;

    /**
     * Create a new job instance.
     *
     * @param Raffle $raffle
     * @param Request $request
     */
    public function __construct(Raffle $raffle, Request $request)
    {
        if(!Auth::user()->isAdmin())
        {
            dd('Permissions Denied');
        }
        $this->iniRequest($request);
        $this->open_raffle = $raffle;
        $this->title = 'Users';
        $this->appends = [];
    }

    /**
     * ini Request
     */
    private function iniRequest($request){
      $this->first_name = trim($request->first_name);
      $this->last_name = trim($request->last_name);
    }

    /**
     * Execute the job.
     *
     * @return $this
     */
    public function handle()
    {
       $this->users = User::with(['payments'=>function($p){
           $p->select('id','user_id','charge_amount','fee','discount');
       },'tickets'=>function($t){
           $t->select('id','user_id');
       }])->orderBy('name');
       $this->addFilters();
        $this->users =  $this->users->paginate(25)->appends($this->appends);
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
        if ($this->first_name) {
            $this->users = $this->users->where('name', 'LIKE' , "%{$this->first_name}%");
            $this->appends['first_name'] = $this->first_name;
        }
        if ($this->last_name) {
            $this->users = $this->users->where('last_name', 'LIKE' , "%{$this->last_name}%");
            $this->appends['last_name'] = $this->last_name;
        }
        return $this;
    }
}
