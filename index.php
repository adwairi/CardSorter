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
$sortedCards = $sorter->sort();
echo $sortedCards;

//
//
//$x = recursiveSort($cards_array, count($cards_array), 0);
//print_r($cards_array);
//echo '<br/>';
//print_r($x);
//function recursiveSort($cards_array, $cards_count, $start_index = 0)
//{
//    if ($start_index == $cards_count - 1) {
//        return $cards_array;
//    }
//    for ($i = $start_index; $i < $cards_count; $i++) {
//        for ($k = $i + 1; $k < $cards_count; $k++) {
//            if ($cards_array[$i]['from'] == $cards_array[$k]['to']) {
//                $cards_array = swapIndexes($cards_array, $i, $k);
//
//                return recursiveSort($cards_array, $cards_count, $i);
//            }
//        }
//    }
//
//    return $cards_array;
//}
//
//function swapIndexes($cards_array, $i, $k)
//{
//    $temp            = $cards_array[$i];
//    $cards_array[$i] = $cards_array[$k];
//    $cards_array[$k] = $temp;
//
//    return $cards_array;
//}

//foreach ($arr as $k=>$trip){
//    $from[$k] = $trip['from'];
//    $to[$k] = $trip['to'];
//}
//$start = array_diff($from, array_intersect($to,$from));
//
//print_r($start); echo '<br/>';
//print_r($from); echo '<br/>';
//print_r($to);