<?php
use Sort\Sorter;

/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2/2/18
 * Time: 3:34 PM
 */
class SorterTest extends PHPUnit_Framework_TestCase
{
    public $cards = [
        [
            "from"                      => "Gerona Airport",
            "to"                        => "Stockholm",
            "transportationType"        => "Flight",
            "transportationNumber" => "SK455",
            "seat"                      => "3A",
            "gate"                      => "45B",
            "baggage"                   => "334",
        ],
        [
            "from"             => "Stockholm",
            "to"               => "New York",
            "transportationType"        => "Flight",
            "transportationNumber" => "SK22",
            "seat"                  => "7B",
            "gate"                  => "22",
        ],
        [
            "from"      => "Barcelona",
            "to"        => "Gerona Airport",
            "transportationType" => "Bus",
            "busName" => "Airport Bus",
        ],
        [
            "from"                 => "Madrid",
            "to"                   => "Barcelona",
            "transportationType"   => "Train",
            "transportationNumber" => "78A",
            "seat"                 => "45B",
        ],
    ];
    public $expectedArray = [
        [
            "from" => "Madrid",
            "to" => "Barcelona",
            "transportationType" => "Train",
            "transportationNumber" => "78A",
            "seat" => "45B"
        ],
        [
            "from" => "Barcelona",
            "to" => "Gerona Airport",
            "transportationType" => "Bus",
            "busName" => "Airport Bus",
        ],
        [
            "from" => "Gerona Airport",
            "to" => "Stockholm",
            "transportationType" => "Flight",
            "transportationNumber" => "SK455",
            "seat" => "3A",
            "gate" => "45B",
            "baggage" => "334",
        ],
        [
            "from" => "Stockholm",
            "to" => "New York",
            "transportationType" => "Flight",
            "transportationNumber" => "SK22",
            "seat" => "7B",
            "gate" => "22",
        ]
    ];
    public $expectedHTML = "<ol><li>Take Train 78A From Madrid To Barcelona. Seat 45B.</li><li>Take Airport Bus From Barcelona To Gerona Airport. No seat assignment.</li><li>Take Flight SK455 From Gerona Airport To Stockholm. Gate 45B. Seat 3A. Baggage drop at ticket counter 334.</li><li>Take Flight SK22 From Stockholm To New York. Gate 22. Seat 7B. Baggage will we automatically transferred from your last leg..</li><li>You have arrived at your final destination.</li></ol>";


    public function testSortArray()
    {
        $sorterObj = new Sorter($this->cards);
        $sortedCards = $sorterObj->sort();
        $this->assertEquals(json_encode($this->expectedArray), json_encode($sortedCards->toArray()));
    }

    public function testSortHTML()
    {
        $sorterObj = new Sorter($this->cards);
        $sortedCards = $sorterObj->sort();
        $this->assertEquals($this->expectedHTML, $sortedCards->toHTML());
    }
}