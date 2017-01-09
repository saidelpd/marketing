<?php namespace App\Http\Helpers\Graph;
use Carbon\Carbon;

class Data
{
    public $labels;
    public $datasets;

    /**
     * Data constructor.
     * @param $labels
     */
    public function __construct($labels)
    {
        $this->labels = $labels;
    }

    /**
     * set DataSet
     * @param $data_set
     * @return $this
     */
    public function setDataSet($data_set)
    {
        $this->datasets = $data_set;
        /**
         * Make Sure That the data set has the same data amount
         * as the labels if not fulfill with zeros
         */
        $label_count = count($this->labels);
        $this->datasets->each(function($set) use($label_count){
            if(count($set->data) != $label_count)
            {
                for($i = 0 ;$i<$label_count; $i++)
                {
                    $set->data[]=0;
                }
            }
        });
        return $this;
    }
}