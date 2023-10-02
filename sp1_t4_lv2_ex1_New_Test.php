<?php

/* * Exercise 1
- Create the PokerDice class. The faces of a poker die have the following numbers: Ace, K, Q, J, 7 and 8.
- Create the throw method that does nothing more than throw the die, and generate a random value for the object to which the method is applied.
- It also creates the faceName method, which informs which face came out in the last roll of the die in question.
Make an app that lets you roll five poker die at once.
Additionally, create the getTotalThrows method which should display the total number of tosses among all the dice. */

/* Plan
1. Create a variable to store the last die face;
2. Create an array with the die faces as strings to simulate the die;
3. Create a throw method that pick the array of die faces and ramdomize values on each index of the array;
All these steps inside the PokerDice class.

4. Finally use the variable to store the die faces with the result of the random sort of the array;
5. Ask to the user to throw the die again and add 1 to the throw method each time the user said "yes";
All these steps inside the PokerDice App.

*/

class PokerDice{
    private $lastDieFace;
   
public function throwDie(){
    $dieFacesArray = ["Ace", "K", "Q", "J", "7", "8"];
    $dieFaceRandom = array_rand($dieFacesArray);
    //$this->lastDieFace = $dieFacesArray($dieFaceRandom);
    $this->lastDieFace = $dieFacesArray[$dieFaceRandom]; // Fucking parenthesis!
}

public function faceName(){
    return $this->lastDieFace;
}

}
//Poker Dice App
class PokerDiceApp{
    public $dice = [];
    public $totalThrows = 0;
    
    //Create 5 dice at once.
    public function __construct(){
        for($i = 0; $i < 5; $i++){
            $this->dice[] = new PokerDice();
        }
    }

    //Throw All Dice Method uses a foreach using the method throw die.
    public function throwAllDie(){
        //$throwsCount = 0; 
        foreach($this->dice as $die){
            $die->throwDie();
            //$throwsCount++;
            $this->totalThrows++;
        }
        //$this->totalThrows += $throwsCount;
    }

    //Count Dice Throws Method.
    public function countDieThrows(){
    return $this->totalThrows;
    }

    //Play again method
    public function playAgain(){
        do{
            $this->throwAllDie();

            //Show all dice faces using a foreach loop.
            foreach($this->dice as $die){
            echo "Die Face: " . $die->faceName() . "\n";
            }

            //Show throws count of dice.
            echo "Total Dice Throws: " . $this->countDieThrows(); // Changed $this->dice to $PokerDiceApp->countDieThrows()

            $playAgain = readline("Do you want to play another round? (y/n");

        } while($playAgain == "y");

        echo "Done";
    }
}

$PokerDiceApp = new PokerDiceApp;

$PokerDiceApp->playAgain();


/* $PokerDiceApp = new PokerDiceApp;

$PokerDiceApp->throwAllDie();

//Show all dice faces using a foreach loop.
foreach($PokerDiceApp->dice as $die){
echo "Die Face: " . $die->faceName() . "\n";
}

//Show throws count of dice.
echo "Total Dice Throws: " . $PokerDiceApp->countDieThrows();*/

?>