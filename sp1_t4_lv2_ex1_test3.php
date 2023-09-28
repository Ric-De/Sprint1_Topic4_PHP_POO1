<?php

$storeUserInput = $_POST['play-again'];

if ($storeUserInput == 'n') {
    exit; // Exit the script if the user chooses not to play again
}

// The rest of your game logic goes here
// You can include your existing game logic here

/* $storeUserInput = readline('Please, do you want to play again? (y/n): ');

if ($storeUserInput == 'n') {
    exit;
} else {

} 

echo readline($storeUserInput);
 */

/* do { */

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
//PokerDice::resetTotalThrows();


/* } while ($storeUserInput == 'y'); */


?>
