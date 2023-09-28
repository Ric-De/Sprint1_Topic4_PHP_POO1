<?php

/* Exercise 1
- Create the PokerDice class. The faces of a poker die have the following numbers: Ace, K, Q, J, 7 and 8.

- Create the throw method that does nothing more than throw the die, and generate a random value for the object to which the method is applied.
- It also creates the faceName method, which informs which face came out in the last roll of the die in question.

Make an app that lets you roll five poker die at once.
Additionally, create the getTotalThrows method which should display the total number of tosses among all the dice.*/

class Die_1 {
    private $lastResult;

    public function roll() {
        // Generate a random number between 1 and 6 (for a standard six-sided die)
        $this->lastResult = rand(1, 6);
    }

    public function getLastResult() {
        return $this->lastResult;
    }
}

class DiceApp {
    private $dice = [];
    private $totalThrows = 0;

    public function __construct($numDice = 5) {
        // Create the specified number of dice and add them to our dice array
        for ($i = 0; $i < $numDice; $i++) {
            $this->dice[] = new Die_1();
        }
    }

    public function rollAllDice() {
        // Roll all the dice in our array
        foreach ($this->dice as $die) {
            $die->roll();
        }

        // Increment the total throws by the number of dice (5 in this case)
        $this->totalThrows += count($this->dice);
    }

    public function getTotalThrows() {
        return $this->totalThrows;
    }

    public function getLastResults() {
        // Get the last results for all dice
        $lastResults = [];
        foreach ($this->dice as $die) {
            $lastResults[] = $die->getLastResult();
        }
        return $lastResults;
    }
}

// Create an instance of the DiceApp with 5 dice
$app = new DiceApp();

// Roll all five dice
$app->rollAllDice();

// Display the results
echo "Last Results: " . implode(", ", $app->getLastResults()) . "<br>";
echo "Total Throws: " . $app->getTotalThrows();




/* class PokerDice{
    private $dice;
    private $faceName;
    private $totalThrows;

    public function __construct(){
        $this->dice = array();
        $this->faceName = array();
        $this->totalThrows = 0;
    }

    public function throw(){
        $this->dice[] = rand(1, 6);
        $this->totalThrows++;
    }

    public function getTotalThrows(){
        return $this->totalThrows;
    }

    public function getFaceName(){
        return $this->faceName;
    }
}

$dice = new PokerDice();

$dice->throw(); */


?>