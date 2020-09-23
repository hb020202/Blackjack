<?php
/**Picks a card value
 *
 * @return array|string
 */
function pickCard() {
    $cards=[2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10, 'Jack'=>10, 'Queen'=>10, 'King'=>10, 'Ace'=>11];
    return $card = array_rand($cards,1);
}

/**Picks a card suit
 *
 * @return string
 */
function pickSuit() {
    $suits=[" of Hearts &#9829"=>0, " of Diamonds &#9830"=>1, " of Clubs &#9827"=>2, " of Spades &#9824"=>3];
    return $pick = array_rand($suits,1) . "<br>";
}

/**Takes the value of a card and returns an int even if given a string
 *
 * @param $card
 *
 * @return int
 */
function strFix($card) {
    if ($card === 'Jack' || $card === 'Queen' || $card === 'King') {
        return 10;
    } elseif ($card === 'Ace') {
        return 11;
    } return $card;
}

/**Takes the total value of a hand and returns a message
 *
 * @param $total
 *
 * echos string
 */
function totals($total) {
    if ($total>21) {
        echo "Over 21 - you're out<br>";
    } else {
        echo "Total: $total <br>";
    }
}

/**Takes two totals and returns a message
 *
 * @param $totalP1
 * @param $totalP2
 *
 * echos string
 */
function winner($totalP1, $totalP2) {
    if ($totalP1 > $totalP2 || $totalP2 === 22) {
        echo "<br>Player One wins!";
    } elseif ($totalP1 < $totalP2 || $totalP1 === 22) {
        echo "<br>Player Two wins!";
    } elseif ($totalP1 === $totalP2) {
        echo "<br>Draw, play again";
    }
}

$cardPick1 = pickCard();
$suitPick = pickSuit();
$wCard1 = $cardPick1.$suitPick;
$cardPick2 = pickCard();
$suitPick = pickSuit();
$wCard2 = $cardPick2.$suitPick;
$cardPick3 = pickCard();
$suitPick = pickSuit();
$wCard3 = $cardPick3.$suitPick;
$cardPick4 = pickCard();
$suitPick = pickSuit();
$wCard4 = $cardPick4.$suitPick;
$totalP1 = (strFix($cardPick1) + strFix($cardPick2));
$totalP2 = (strFix($cardPick3) + strFix($cardPick4));
$cardArray = [$wCard1, $wCard2, $wCard3, $wCard4];
if(count(array_unique($cardArray))<count($cardArray))
{
    echo "AHHHHHHH ERRORRR! Play again!";
} else {
    echo "<u>Player One</u> <br>";
    echo $wCard1;
    echo $wCard2;
    totals($totalP1);
    echo "<br><u>Player Two</u> <br>";
    echo $wCard3;
    echo $wCard4;
    totals($totalP2);
    winner($totalP1, $totalP2);
}