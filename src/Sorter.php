<?php
namespace Sort;

use Sort\Models\Train;
use Sort\Models\Bus;
use Sort\Models\Flight;
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2/2/18
 * Time: 12:08 PM
 */
class Sorter
{
    private $cards;
    private $sortedCards;
    function __construct($cards = [])
    {
        $this->cards = $cards;
    }

    public function sort(){
        $cards = $this->cards;
        $noOfCards = count($cards);
        $this->sortedCards = $this->feacher($cards, $noOfCards, 0);
        return $this;
//        return $this->html($sortedCards);
    }

    private function feacher($cards,$noOfCards, $cardIndex){
        if ($cardIndex == $noOfCards - 1) {
            return $cards;
        }
        for ($currentCard = $cardIndex; $currentCard < $noOfCards; $currentCard++) {
            for ($nextCard = $currentCard + 1; $nextCard < $noOfCards; $nextCard++) {
                if ($cards[$currentCard]['from'] == $cards[$nextCard]['to']) {
                    $cards = $this->swicher($cards, $currentCard, $nextCard);

                    return $this->feacher($cards, $noOfCards, $currentCard);
                }
            }
        }

        return $cards;
    }
    
    private function swicher($cards, $currentCard, $nextCard){
        $temp = $cards[$currentCard];
        $cards[$currentCard] = $cards[$nextCard];
        $cards[$nextCard] = $temp;

        return $cards;
    }


    public function toArray(){
        return $this->sortedCards;
    }

    public function toHTML(){
        $sortedCards = $this->sortedCards;
        $html = '<ol>';
        foreach ($sortedCards as $card){
            $className = "Sort\\Models\\".$card['transportationType'];
            $obj = new $className($card);
            $html .= '<li>'.$obj->text().'</li>';
        }
        $html .= '<li>You have arrived at your final destination.</li>';
        $html .= '</ol>';
        return $html;
    }


}