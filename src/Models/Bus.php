<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2/2/18
 * Time: 8:50 AM
 */

namespace Sort\Models;

use Sort\Models\Transportation;
class Bus extends Transportation
{
    private $busName;
    function __construct($card = [])
    {
        parent::__construct($card);
        if (count($card)){
            $this->busName = isset($card['busName']) ? $card['busName'] : null;
        }
    }

    private function busName(){
        if (is_null($this->busName))
            return $this->transportationType();
        return $this->busName;
    }

    public function text(){
        $text = 'Take '. $this->busName();
        $text .= ' '.$this->from().' '.$this->to().'. ';
        $text .= ' '.$this->seat().'.';

        return $text;
    }
}