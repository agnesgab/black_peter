<?php

class Card
{
    private string $suit;
    private string $symbol;


    public function __construct(string $suit, string $symbol)
    {
        $this->suit = $suit;
        $this->symbol = $symbol;


    }


    /**
     * @return string
     */
    public function getSuit(): string
    {
        return $this->suit;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }


    public function getDisplayValue(): string
    {
        return "{$this->symbol}.{$this->suit}";
    }
}