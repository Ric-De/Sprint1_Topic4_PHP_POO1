<?php

class Cinema {

    private $name;
    private $town;
    private $movies = [];
    

public function __construct($name, $town) {
    $this->name = $name;
    $this->town = $town;
}

public function addMovie(Movie $movie) {
    $this->movies[] = $movie;
}

public function getMovies() {
    return $this->movies;
}

public function getName() {
    return $this->name;
}

public function getTown() {
    return $this->name;
}

public function getLongestMovie() {
    $longestMovie = null;
    $maxDuration = 0;
    foreach ($this->movies as $movie) {
        if ($movie->getDuration() > $maxDuration) {
            $maxDuration = $movie->getDuration();
            $longestMovie = $movie;
        }
    }
    return $longestMovie;
}

public function hasDirector($directorName) {
    foreach($this->movies as $movie) {
        if($movie->getDirector() == $directorName){
            return true;
        }
    }
    return false;
}

}

?>