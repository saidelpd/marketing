<?php namespace App\Http\Helpers\Graph;

class Dataset
{
    public $label;
    public $data;
    public $borderColor;
    public $lineTension;
    /**
     * Dataset constructor.
     * @param $label
     * @param $color
     */
    public function __construct($label,$color)
    {
        $this->label = $label;
        $this->borderColor = $color;
        $this->data = collect();
        $this->lineTension = 0.3;
    }

    /**
     * Set DataSetData
     * @param $data
     */
    public function setData($data)
    {
        $this->data->push($data);
    }


}

