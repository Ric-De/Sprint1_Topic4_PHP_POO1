<?php

/* Exercise 1
Imagine that you have to present the movie catalog of a cinema chain. Each cinema has a name, a town it belongs to, and a list of films. Each movie has a name, a duration, and a director.

It's about making a program that allows us to record this information for later:

For each movie theater, display the data for each movie.
For each cinema, show the film with the longest duration.
Implement a feature that searches by director name for movies in different theaters. No need to repeat movies. */

$spainCinemaChain = array(
    array(
        'name' => 'BCN Downtown Cinema',
        'town' => 'Barcelona',
        'films' => array(
            array(
                'name' => 'The Lord of the Rings: The Return of the King',
                'duration' => 359,
                'director' => 'John Smith'
            ),
            array(
                'name' => 'Wonder Woman',
                'duration' => 120,
                'director' => 'Teresa Flores'
            ),
            array(
                'name' => 'The Thing',
                'duration' => 200,
                'director' => 'John Doe'
            )
            )
        ),
    array(
        'name' => 'Valencia OldCity Cinema',
        'town' => 'Valencia',
        'films' => array(
            array(
                'name' => 'The Lord of the Rings: extended version of the more stuppid fans with long weird names given by her parents',
                'duration' => 360,
                'director' => 'Weird Name'
            ),
            array(
                'name' => 'Three bald guys fighting for a hairbrush',
                'duration' => 600,
                'director' => 'Bald Guy'
            ),
            array(
                'name' => 'Alice in the Wonderland',
                'duration' => 80,
                'director' => 'Florence Stuart'
            )
            )
            ),
    array(
        'name' => 'Madrid Outskirts Cinema',
        'town' => 'Madrid',
        'films' => array(
            array(
                'name' => 'The Lord of the Rings: uncensored',
                'duration' => 361,
                'director' => 'El Gran Director'
            ),
            array(
                'name' => 'Aliens vs Predator',
                'duration' => 400,
                'director' => 'Teresa Flores'
            ),
            array(
                'name' => 'Rebelion',
                'duration' => 90,
                'director' => 'Marc Fuentes'
            )
            )
            )

                    );

                    //var_dump($spainCinemaChain);

//Function to show all cinemas and movies on them

function showCinemaChain($cinemaChain)
{
    foreach ($cinemaChain as $cinema) {
        echo '<h2>'. $cinema['name']. '</h2>';
        echo '<p>'. $cinema['town']. '</p>';
        echo '<ul>';
        foreach ($cinema['films'] as $film) {
            echo '<li>'. "Movie Name: ". $film['name']. '</li>';
            echo '<li>'. "Duration: ". $film['duration']." min". '</li>';
            echo '<li>'. "Director Name: ". $film['director']. '</li>';
            echo "<br>";
        }
        echo '</ul>';
    }
}

showCinemaChain($spainCinemaChain);

//Function to show the film with the longest duration per each cinema.

/* function showMoreLongFilmByCinema($spainCinemaChain){
    foreach ($spainCinemaChain as $cinema) {
        echo '<h2>'. $cinema['name']. '</h2>';
        echo '<p>'. $cinema['town']. '</p>';
        echo '<ul>';
        foreach ($cinema['films'] as $film) {
            echo '<li>'. "Duration: ". $film['duration'].' min '.'</li>';
            if ($film['duration'] > $film['duration']) { 
            
        }
        




            if ($film['duration'] == max($cinema['films'])) {
                echo '<li>'. "Movie Name: ". $film['name']. '</li>';
                echo '<li>'. "Duration: ". $film['duration']." min". '</li>';
                echo '<li>'. "Director Name: ". $film['director']. '</li>';
                echo "<br>";
            } 
        
        echo '</ul>';
    }
}
} */

function showMoreLongFilmByCinema($spainCinemaChain)
{
    foreach ($spainCinemaChain as $cinema) {
        echo '<h2>' . $cinema['name'] . '</h2>';
        echo '<p>' . $cinema['town'] . '</p>';
        echo '<ul>';
        
        $longestFilm = null; // Initialize to null

        foreach ($cinema['films'] as $film) {
            /* echo '<li>' . "Movie Name: " . $film['name'] . '</li>';
            echo '<li>' . "Duration: " . $film['duration'] . ' min' . '</li>';
            echo '<li>' . "Director Name: " . $film['director'] . '</li>';
            echo "<br>"; */

            // Check if the current film has a longer duration than the previously found longest film
            if ($longestFilm === null || $film['duration'] > $longestFilm['duration']) {
                $longestFilm = $film;
            }
        }

        // Display the longest film for this cinema
        if ($longestFilm !== null) {
            echo '<p>' . "Longest Film: " . $longestFilm['name'] . '</p>';
            echo '<p>' . "Duration: " . $longestFilm['duration'] . ' min' . '</p>';
            echo '<p>' . "Director Name: " . $longestFilm['director'] . '</p>';
        }

        echo '</ul>';
    }
}

showMoreLongFilmByCinema($spainCinemaChain);



/* function showFilmWithLongestDuration($cinemaChain)
{
    $longestFilm = array();
    foreach ($cinemaChain as $cinema) {
        foreach ($cinema['films'] as $film) {
            if (!array_key_exists($film['name'], $longestFilm)) {
                $longestFilm[$film['name']] = $film['duration'];
            } else {
                if ($film['duration'] > $longestFilm[$film['name']]) {
                    $longestFilm[$film['name']] = $film['duration'];
                }
            }
        }
    }
    arsort($longestFilm);
    foreach ($longestFilm as $key => $value) {
        echo '<h2>'. $key. '</h2>';
        echo '<p>'. $value." min". '</p>';
    }
}

showFilmWithLongestDuration($spainCinemaChain); */

//Function to search by director name for movies in different theaters.

/* function searchByDirector($cinemaChain, $directorName)
{
    foreach ($cinemaChain as $cinema) {
        //$directorName = 'Bald Guy';

        foreach ($cinema['films'] as $film) {
            
            if ($film['director'] == $directorName) {
                echo '<h2>'. $cinema['name']. '</h2>';
                echo '<p>'. $cinema['town']. '</p>';
                echo '<ul>';
                echo '<li>'. "Movie Name: ". $film['name']. '</li>';
                echo '<li>'. "Duration: ". $film['duration']." min". '</li>';
                echo '<li>'. "Director Name: ". $film['director']. '</li>';
                echo "<br>";
            } else{
                echo'<h2>Name not found</h2>';
            }
            echo '</ul>';
            echo '<br>';
        }
        echo '</ul>';
        echo '<br>';
    }
} */

function searchByDirector($cinemaChain, $directorName)
{
    $found = false; // Initialize a flag to track if any films were found

    foreach ($cinemaChain as $cinema) {
        echo '<h2>' . $cinema['name'] . '</h2>';
        echo '<p>' . $cinema['town'] . '</p>';
        echo '<ul>';

        foreach ($cinema['films'] as $film) {
            if ($film['director'] == $directorName) {
                echo '<li>' . "Movie Name: " . $film['name'] . '</li>';
                echo '<li>' . "Duration: " . $film['duration'] . ' min' . '</li>';
                echo '<li>' . "Director Name: " . $film['director'] . '</li>';
                echo "<br>";
                $found = true; // Set the flag to true if a film is found
            }
        }

        echo '</ul>';
        echo '<br>';
    }

    // Check if no films were found and display a message
    if (!$found) {
        echo '<h2>Name not found</h2>';
    }
}

searchByDirector($spainCinemaChain, 'Bald Guy');


/* function searchByDirector($cinemaChain, $directorName)
{
    foreach ($cinemaChain as $cinema) {
        $found = false; // Initialize a flag to track if any films were found for this cinema

        echo '<h2>' . $cinema['name'] . '</h2>';
        echo '<p>' . $cinema['town'] . '</p>';
        echo '<ul>';

        foreach ($cinema['films'] as $film) {
            if ($film['director'] == $directorName) {
                echo '<li>' . "Movie Name: " . $film['name'] . '</li>';
                echo '<li>' . "Duration: " . $film['duration'] . ' min' . '</li>';
                echo '<li>' . "Director Name: " . $film['director'] . '</li>';
                echo "<br>";
                $found = true; // Set the flag to true if a film is found
            }
        }

        echo '</ul>';
        echo '<br>';

        // Check if no films were found for this cinema and skip displaying it
        if (!$found) {
            continue;
        }
    }
} */

echo '<br>';
echo '¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬';
echo '<br>';


function filterMoviesByDirector($cinemaChain, $directorName)
{
    $filteredMovies = [];

    foreach ($cinemaChain as $cinema) {
        foreach ($cinema['films'] as $film) {
            if ($film['director'] == $directorName) {
                $filteredMovies[] = $film;
            }
        }
    }

    return $filteredMovies;
}

$filteredMovies = filterMoviesByDirector($spainCinemaChain, 'Bald Guy');

// Display the filtered movies
foreach ($filteredMovies as $film) {
    echo '<h2>' . $film['name'] . '</h2>';
    echo '<p>' . 'Duration: ' . $film['duration'] . ' min' . '</p>';
    echo '<p>' . 'Director Name: ' . $film['director'] . '</p>';
    echo '<br>';
}

echo '<br>';
echo '¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬';
echo '<br>';

function findLongestMovieDuration($cinemaChain)
{
    // Initialize the accumulator for the longest duration
    $longestDuration = 0;

    // Use array_reduce to find the longest duration across all movies
    $longestMovie = array_reduce($cinemaChain, function ($carry, $cinema) {
        foreach ($cinema['films'] as $film) {
            if ($film['duration'] > $carry['duration']) {
                // If the current movie has a longer duration, update the carry
                return $film;
            }
        }
        return $carry;
    }, ['duration' => 0]);

    return $longestMovie;
}

$longestMovie = findLongestMovieDuration($spainCinemaChain);

// Display the longest movie
echo '<h2>' . $longestMovie['name'] . '</h2>';
echo '<p>' . 'Duration: ' . $longestMovie['duration'] . ' min' . '</p>';
echo '<p>' . 'Director Name: ' . $longestMovie['director'] . '</p>';


?>