<?php

class BlackPeter {

    private Deck $deck;


    public function __construct()
    {
        $this->deck = new Deck;
    }

    public function deal(): Card{
        return $this->deck->draw();
    }

    /**
     * @return Deck
     */
    public function getDeck(): Deck
    {
        return $this->deck;
    }


}