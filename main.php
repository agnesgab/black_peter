<?php
require_once 'Card.php';
require_once 'Deck.php';
require_once 'BlackPeter.php';
require_once 'Player.php';

$game = new BlackPeter();
$player = new Player();
$npc = new Player();


for ($i = 0; $i < 25; $i++) {
    $player->addCard($game->deal());
}

for ($i = 0; $i < 24; $i++) {
    $npc->addCard($game->deal());
}

echo 'PLAYER' . PHP_EOL;
foreach ($player->getCards() as $card) {
    echo '[' . $card->getDisplayValue() . ']';
}

echo PHP_EOL;


echo 'NPC' . PHP_EOL;
foreach ($npc->getCards() as $card) {
    echo '[' . $card->getDisplayValue() . ']';
}

echo PHP_EOL;
echo PHP_EOL;



echo '========DISBAND========' . PHP_EOL;
echo PHP_EOL;

$player->disband();
echo 'PLAYER' . PHP_EOL;
foreach ($player->getCards() as $card) {
    echo '[' . $card->getDisplayValue() . ']';
}

echo PHP_EOL;

echo 'NPC' . PHP_EOL;
$npc->disband();
foreach ($npc->getCards() as $card) {
    echo '[' . $card->getDisplayValue() . ']';
}

echo PHP_EOL;
echo PHP_EOL;
echo '========CARD SWAP========' . PHP_EOL;
while ($player->checkCardsOnHand() || $npc->checkCardsOnHand()) {
    $draw = [];
    if(!$npc->checkCardsOnHand()) break;
        sleep(1);
        echo PHP_EOL;
        echo 'PLAYER' . PHP_EOL;
        $a = $npc->giveCard();
        $draw[] = $a;
        $player->addCard($a);
        $player->disband();
        foreach ($player->getCards() as $card) {
            echo '[' . $card->getDisplayValue() . ']';
        }




    if(!$player->checkCardsOnHand()) break;
        echo PHP_EOL;
        echo 'NPC' . PHP_EOL;
        $b = $player->giveCard();
        $npc->addCard($b);
        $draw[] = $b;
        $npc->disband();
        foreach ($npc->getCards() as $card) {
            echo '[' . $card->getDisplayValue() . ']';
        }
        echo PHP_EOL;

}

if($player->getWinner()){
    echo 'You won!';
} else {
    echo 'Computer won!';
}

echo PHP_EOL;


