<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2/2/18
 * Time: 8:46 AM
 */

namespace Sort\Models;

use Sort\Models\Transportation;
class Train extends Transportation
{
    private $transportationNumber;

    function __construct($card = [])
    {
        parent::__construct($card);

        if (count($card)){
            $this->transportationNumber = isset($card['transportationNumber']) ? $card['transportationNumber'] : null;
        }
    }


    public function transportationNumber(){
        if (is_null($this->transportationNumber))
            return '';
        return $this->transportationNumber;
    }

    public function text(){
        $text = 'Take '. $this->transportationType().' '.$this->transportationNumber().' ';
        $text .= $this->from().' '.$this->to().'.';
        $text .= ' '.$this->seat().'.';

        return $text;
    }
}