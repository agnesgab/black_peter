<?php

class Player
{
    private array $cards;


    public function getCards(): array
    {
        return $this->cards;
    }

    public function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }




    public function disband()
    {

        $redCards = [];
        $blackCards = [];

        foreach ($this->cards as $card) {
            if ($card->getSuit() === '♦' || $card->getSuit() === '♥') {
                $redCards[] = $card->getSymbol();
            } elseif ($card->getSuit() === '♣' || $card->getSuit() === '♠') {
                $blackCards[] = $card->getSymbol();
            }
        }


        $uniqueRedCardsCount = array_count_values($redCards);
        $uniqueBlackCardsCount = array_count_values($blackCards);


        foreach ($uniqueRedCardsCount as $symbol => $count) {
            if ($count === 1) continue;
            if ($count === 2) {
                foreach ($this->cards as $index => $card) {
                    if ($card->getSymbol() === (string)$symbol && $card->getSuit() !== '♣' && $card->getSuit() !== '♠') {
                        unset($this->cards[$index]);

                    }
                }
            }

        }

        foreach ($uniqueBlackCardsCount as $symbol => $count) {
            if ($count === 1) continue;
            if ($count === 2) {
                foreach ($this->cards as $index => $card) {
                    if ($card->getSymbol() === (string)$symbol&& $card->getSuit() !== '♦' && $card->getSuit() !== '♥') {
                        unset($this->cards[$index]);

                    }
                }
            }
        }

//FOR IGNORING COLORS:
//
//        $symbols = [];
//        foreach ($this->cards as $card) {
//            $symbols[] = $card->getSymbol();
//
//        }
//        $uniqueCardsCount = array_count_values($symbols);
//
//        foreach ($uniqueCardsCount as $symbol => $count) {
//            if ($count === 1) continue;
//            if ($count === 2 || $count === 4) {
//                foreach ($this->cards as $index => $card) {
//                    if ($card->getSymbol() === (string)$symbol) {
//                        unset($this->cards[$index]);
//
//                    }
//                }
//            }
//            if ($count === 3) {
//                for ($i = 0; $i < 2; $i++) {
//                    foreach ($this->cards as $index => $card) {
//                        if ($card->getSymbol() === (string)$symbol) {
//                            unset($this->cards[$index]);
//                            break;
//                        }
//
//                    }
//                }
//            }
//        }
    }


    public function giveCard(): Card
    {

        shuffle($this->cards);
        return array_pop($this->cards);

    }

    public function checkCardsOnHand()
    {
      return count($this->getCards()) > 0;
    }


    public function getWinner()
    {
        return !$this->checkCardsOnHand();

    }


}