<?php

/* Exercise 1
- Create the PokerDice class. The faces of a poker die have the following numbers: Ace, K, Q, J, 7 and 8.

- Create the throw method that does nothing more than throw the die, and generate a random value for the object to which the method is applied.
- It also creates the faceName method, which informs which face came out in the last roll of the die in question.

Make an app that lets you roll five poker die at once.
Additionally, create the getTotalThrows method which should display the total number of tosses among all the dice.*/

/* Plan
1.  Create a variable to hold the faces of the die after the throw;
2.  Create a constructor for the face variable and initialize it;
3.  Create the throw method for the face variable;
4.  Create another variable to hold 
*/


class PokerDice {
    private $face; // Represents the face of the die

    // Constructor
    public function __construct() {
        $this->face = null; // Initialize face to null
    }

    // Method to throw the die and generate a random face
    public function throwDie() {
        $faces = ["Ace", "K", "Q", "J", "7", "8"];
        $randIndex = array_rand($faces);
        $this->face = $faces[$randIndex];
    }

    // Method to get the face of the last roll
    public function getFaceName() {
        return $this->face;
    }

    // Class-level variable to track total throws
    private static $totalThrows = 0;

    // Method to update the total throws and return it
    public static function getTotalThrows() {
        return self::$totalThrows;
    }

    // Method to throw the die and update the total throws
    public function throwAndCount() {
        $this->throwDie();
        self::$totalThrows++;
    }

    // Reset total throws to zero
    public static function resetTotalThrows() {
        self::$totalThrows = 0;
    }
}

// Create an array to hold five dice
$diceArray = [];

// Initialize and roll five dice
for ($i = 0; $i < 5; $i++) {
    $diceArray[$i] = new PokerDice();
    $diceArray[$i]->throwAndCount();
}

// Display the faces of the rolled dice
for ($i = 0; $i < 5; $i++) {
    echo "Die " . ($i + 1) . ": " . $diceArray[$i]->getFaceName() . "\n";
}

// Display the total number of throws
echo "Total throws: " . PokerDice::getTotalThrows() . "\n";

// Reset total throws to zero
PokerDice::resetTotalThrows();

?>