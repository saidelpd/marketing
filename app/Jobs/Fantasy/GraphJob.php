<?php

namespace App\Jobs\Fantasy;

use App\Http\Helpers\Graph\Data;
use App\Http\Helpers\Graph\Dataset;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class GraphJob implements ShouldQueue
{
    use SerializesModels;
    private $raffle;
    private $user;
    private $data_sets;
    public $chart_data;

    /**
     * Create a new job instance.
     *
     * @param $raffle
     */
    public function __construct($raffle)
    {
        $this->raffle = $raffle;
        $this->user = Auth::user();
        $this->data_sets = $this->iniDataSets();
        $this->chart_data = new Data($this->getLabels());
        $this->getData();
    }

    /**
     * Execute the job.
     *
     * @return $this
     */
    public function handle()
    {
        $this->chart_data->setDataSet($this->data_sets);
        return $this;
    }

    /**
     * Ini Data Set
     */
    private function iniDataSets()
    {
        return collect([new Dataset('Tickets', '#f8ac59')]);
    }

    /**
     * Return Labels
     */
    private function getLabels()
    {
        $start = $this->raffle->created_at;
        $end = $this->raffle->closing_date;
        $labels = [];
        for ($i = 0; $i < $end->format('m'); $i++) {
            $labels[] = ($i == 0) ? $start->format('Y-F') : $start->addMonth()->format('Y-F');
        }
        return $labels;
    }

    /**
     * Get Data From DataBase
     */
    private function getData()
    {
        $start = $this->raffle->created_at;
        $end = $this->raffle->closing_date;
        for ($i = 0; $i < $end->format('m'); $i++) {
            $aux = clone $start;
            $count = Ticket::whereBetween('created_at', array($start->startOfMonth(), $aux->endOfMonth()));
            if(!$this->user->isAdmin())
            {
                $count = $count->where('user_id',$this->user->id);
            }
            $count = $count->count();
            $this->data_sets->first()->setData($count);
            $start->addMonth();
        }
    }
}
