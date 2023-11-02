<?php

require_once 'Movie.php';
require_once 'Cinema.php';

class Catalog {
    private $cinemas = [];

    public function addCinema(Cinema $cinema) {
        $this->cinemas[] = $cinema;
    }

    public function displayMoviesByCinema() {
        foreach($this->cinemas as $cinema){
            echo "Cinema: {$cinema->getName()}, Town: {$cinema->getTown()}\n";

            foreach($cinema->getMovies() as $movie){
                echo "Movie: {$movie->getName()}, Duration: {$movie->getDuration()} minutes, Director: {$movie->getDirector()}\n";
            }
            echo "\n";
        }
    }

    public function displayLongestMoviesByCinema() {

        foreach ($this->cinemas as $cinema){
            $longestMovie = $cinema->getLongestMovie();
            if($longestMovie) {
                echo "Cinema: {$cinema->getName()}, Town: {$cinema->getTown()}\n";
                echo "Longest Movie: {$longestMovie->getName()}, Duration: {$longestMovie->getDuration()} minutes\n\n";
            }
        }
    }

    public function searchMoviesByDirector($directorName) {
        $foundMovies = [];
        foreach($this->cinemas as $cinema) {
            foreach($cinema->getMovies() as $movie){
                if($movie->getDirector() == $directorName) {
                    $foundMovies[] = [
                        'movie' => $movie,
                        'cinema' => $cinema->getName() // Get the cinema name
                    ];
                }
            }
        }
        return $foundMovies;
    }

}

// Create movies
$movie1 = new Movie("Movie 1", 120, "Director A");
$movie2 = new Movie("Movie 2", 110, "Director B");
$movie3 = new Movie("Movie 3", 130, "Director C");
$movie4 = new Movie("Movie 4", 100, "Director Y");
$movie5 = new Movie("Movie 5", 115, "Director E");
$movie6 = new Movie("Movie 6", 105, "Director Y");
$movie7 = new Movie("Movie 7", 125, "Director G");
$movie8 = new Movie("Movie 8", 95, "Director Y");

// Create cinemas
$cinema1 = new Cinema("Cinema A", "Town A");
$cinema1->addMovie($movie1);
$cinema1->addMovie($movie2);

$cinema2 = new Cinema("Cinema B", "Town B");
$cinema2->addMovie($movie3);
$cinema2->addMovie($movie4);

$cinema3 = new Cinema("Cinema C", "Town C");
$cinema3->addMovie($movie5);
$cinema3->addMovie($movie6);

$cinema4 = new Cinema("Cinema D", "Town D");
$cinema4->addMovie($movie7);
$cinema4->addMovie($movie8);

// Create catalog and add cinemas
$catalog = new Catalog();
$catalog->addCinema($cinema1);
$catalog->addCinema($cinema2);
$catalog->addCinema($cinema3);
$catalog->addCinema($cinema4);

// Display movies by cinema
$catalog->displayMoviesByCinema();

// Display longest movies by cinema
$catalog->displayLongestMoviesByCinema();


// Search movies by director
$directorName = "Director Y";

$foundMovies = $catalog->searchMoviesByDirector($directorName);
echo "Movies directed by {$directorName}:\n";
foreach ($foundMovies as $foundMovie) {
    $movie = $foundMovie['movie'];
    $cinemaName = $foundMovie['cinema'];
    echo "{$movie->getName()}, Duration: {$movie->getDuration()} minutes, Cinema: {$cinemaName}\n";
}

?>