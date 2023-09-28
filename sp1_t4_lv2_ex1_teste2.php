<?php

class PokerDice {
    public $faces = ['Ace', 'K', 'Q', 'J', '7', '8'];
    public $lastRoll;

    /* public function throw() {
        $randomIndex = array_rand($this->faces);
        $this->lastRoll = $this->faces[$randomIndex];
    } */

    public function throw() {
        $randomIndex = mt_rand(0, count($this->faces) - 1);
        $this->lastRoll = $this->faces[$randomIndex];
    }

    public function faceName() {
        return $this->lastRoll;
    }
}

class PokerDiceApp {
    public $dice = [];

    public function __construct($numDice = 5) {
        for ($i = 0; $i < $numDice; $i++) {
            $this->dice[] = new PokerDice();
        }
    }

    public function rollAllDice() {
        foreach ($this->dice as $die) {
            $die->throw();
        }
    }

    public function getTotalThrows() {
        return count($this->dice);
    }
}

// Create an instance of the PokerDiceApp with 5 dice
$app = new PokerDiceApp();

// Roll all five dice
$app->rollAllDice();


// Display the faces of the dice after rolling
foreach ($app->dice as $index => $die) {
    echo "Die " . ($index + 1) . ": " . $die->faceName() . "<br>";
}

// Display the total number of dice (which is also the total number of throws)
echo "Total Dice: " . $app->getTotalThrows();

echo "<br><br>";

$app->rollAllDice();


// Display the faces of the dice after rolling
foreach ($app->dice as $index => $die) {
    echo "Die " . ($index + 1) . ": " . $die->faceName() . "<br>";
}

// Display the total number of dice (which is also the total number of throws)
echo "Total Dice: " . $app->getTotalThrows();







/* class PokerDice {
    public $faces = ['Ace', 'K', 'Q', 'J', '7', '8'];
    public $lastRoll;

    public function throw() {
        $randomIndex = array_rand($this->faces);
        $this->lastRoll = $this->faces[$randomIndex];
    }

    public function faceName() {
        return $this->lastRoll;
    }
}

class PokerDiceApp {
    public $dice = [];

    public function __construct($numDice = 5) {
        for ($i = 0; $i < $numDice; $i++) {
            $this->dice[] = new PokerDice();
        }
    }

    public function rollAllDice() {
        foreach ($this->dice as $die) {
            $die->throw();
        }
    }

    public function getTotalThrows() {
        $totalThrows = 0;
        foreach ($this->dice as $die) {
            $totalThrows += $die->getThrows();
        }
        return $totalThrows;
    }
}

class PokerDiceWithThrows extends PokerDice {
    public $throws = 0;

    public function throw() {
        parent::throw();
        $this->throws++;
    }

    public function getThrows() {
        return $this->throws;
    }
}

// Create an instance of the PokerDiceApp with 5 dice
$app = new PokerDiceApp();

// Roll all five dice
$app->rollAllDice();

// Display the faces of the dice after rolling
foreach ($app->dice as $index => $die) {
    echo "Die " . ($index + 1) . ": " . $die->faceName() . " (Throws: " . $die->getThrows() . ")<br>";
}

// Display the total number of throws (cumulative across all dice)
echo "Total Throws: " . $app->getTotalThrows(); */

?>