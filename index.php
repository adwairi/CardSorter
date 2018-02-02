<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2/1/18
 * Time: 5:49 PM
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);


$loader = require __DIR__.'/vendor/autoload.php';

$cards = [
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

$sorter = new Sort\Sorter($cards);
$sortedCardsObj = $sorter->sort();
//print_r($sortedCardsObj->toArray());
echo $sortedCardsObj->toHTML();