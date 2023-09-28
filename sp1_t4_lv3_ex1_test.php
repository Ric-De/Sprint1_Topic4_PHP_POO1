<?php
// Sample cinema data
$cinemas = [
    [
        "name" => "Cinema A",
        "town" => "Town A",
        "films" => [
            ["name" => "Film 1", "duration" => 120, "director" => "Director A"],
            ["name" => "Film 2", "duration" => 130, "director" => "Director B"],
        ],
    ],
    [
        "name" => "Cinema B",
        "town" => "Town B",
        "films" => [
            ["name" => "Film 3", "duration" => 110, "director" => "Director C"],
            ["name" => "Film 4", "duration" => 150, "director" => "Director A"],
        ],
    ],
];

// Function to display movie data for each cinema
function displayCinemaMovies($cinemas) {
    foreach ($cinemas as $cinema) {
        echo "<h2>{$cinema['name']} ({$cinema['town']})</h2>";
        echo "<ul>";
        foreach ($cinema['films'] as $film) {
            echo "<li>{$film['name']} (Duration: {$film['duration']} minutes, Director: {$film['director']})</li>";
        }
        echo "</ul>";
    }
}

// Function to find the film with the longest duration in each cinema
function findLongestFilm($cinemas) {
    foreach ($cinemas as $cinema) {
        $longestFilm = null;
        $maxDuration = 0;

        foreach ($cinema['films'] as $film) {
            if ($film['duration'] > $maxDuration) {
                $maxDuration = $film['duration'];
                $longestFilm = $film;
            }
        }

        if ($longestFilm) {
            echo "<p>In {$cinema['name']} ({$cinema['town']}), the longest film is '{$longestFilm['name']}' with a duration of {$longestFilm['duration']} minutes.</p>";
        } else {
            echo "<p>No films found for {$cinema['name']} ({$cinema['town']}).</p>";
        }
    }
}

// Function to search for movies by director name
function searchMoviesByDirector($cinemas, $directorName) {
    $foundMovies = [];

    foreach ($cinemas as $cinema) {
        foreach ($cinema['films'] as $film) {
            if ($film['director'] === $directorName && !in_array($film['name'], $foundMovies)) {
                $foundMovies[] = $film['name'];
            }
        }
    }

    return $foundMovies;
}

// Function to search for movies by film name
function searchMoviesByName($cinemas, $filmName) {
    $foundMovies = [];

    foreach ($cinemas as $cinema) {
        foreach ($cinema['films'] as $film) {
            if (stripos($film['name'], $filmName) !== false && !in_array($film['name'], $foundMovies)) {
                $foundMovies[] = $film;
            }
        }
    }

    return $foundMovies;
}

// Function to search for movies by duration
function searchMoviesByDuration($cinemas, $duration) {
    $foundMovies = [];

    foreach ($cinemas as $cinema) {
        foreach ($cinema['films'] as $film) {
            if ($film['duration'] == $duration && !in_array($film['name'], $foundMovies)) {
                $foundMovies[] = $film;
            }
        }
    }

    return $foundMovies;
}

// Example usage
echo "<h1>Movie Catalog</h1>";

// Display search buttons
echo "<form method='post'>";
echo "<label>Search by: </label>";
echo "<select name='searchType'>";
echo "<option value='filmName'>Film Name</option>";
echo "<option value='director'>Director</option>";
echo "<option value='duration'>Duration (minutes)</option>";
echo "</select>";
echo "<input type='text' name='searchTerm' placeholder='Enter search term'>";
echo "<input type='submit' name='searchButton' value='Search'>";
echo "</form>";

// Handle search form submission
if (isset($_POST['searchButton'])) {
    $searchType = $_POST['searchType'];
    $searchTerm = $_POST['searchTerm'];

    if ($searchType === "filmName") {
        $movies = searchMoviesByName($cinemas, $searchTerm);
    } elseif ($searchType === "director") {
        $movies = searchMoviesByDirector($cinemas, $searchTerm);
    } elseif ($searchType === "duration") {
        $movies = searchMoviesByDuration($cinemas, $searchTerm);
    }

    if (!empty($movies)) {
        echo "<h2>Search Results</h2>";
        echo "<ul>";
        foreach ($movies as $movie) {
            echo "<li>{$movie['name']} (Duration: {$movie['duration']} minutes, Director: {$movie['director']})</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No movies found for your search.</p>";
    }
} else {
    // Display all movies by default
    displayCinemaMovies($cinemas);
    findLongestFilm($cinemas);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Movie Catalog</title>
    <style>
        /* Add your CSS styles here for better presentation */
        h1, h2 {
            text-align: center;
        }
        ul {
            list-style-type: none;
        }
        li {
            margin-bottom: 10px;
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
