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

//Function to search by director name for movies in different cinemas. No need to repeat movies.

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

?>

<!DOCTYPE html>
<html>
<head>
    <title>Movie Catalog Spain Cinemas Chain</title>
    <style>
        h1, h2 {
            text-align: center;
        }
        ul {
            list-style-type: none;
        }
        li {
            margin-bottom: 10px;
            text-align: center;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        label, select, input[type="text"], input[type="submit"] {
            margin: 5px;
        }
    </style>
</head>
<body>
    <!-- PHP content is displayed above -->
</body>
</html>