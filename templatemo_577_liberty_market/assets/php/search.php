<?php
include 'db.php';

function searchMoviesByTitle($moviesData, $searchQuery)
{
    $filteredMovies = array_filter($moviesData, function ($movie) use ($searchQuery) {
        return stripos($movie['title'], $searchQuery) !== false;
    });
    return array_values($filteredMovies);
}

function searchMoviesByStudio($moviesData, $searchQuery)
{
    $filteredMovies = array_filter($moviesData, function ($movie) use ($searchQuery) {
        return stripos($movie['studio'], $searchQuery) !== false;
    });
    return array_values($filteredMovies);
}

function searchMoviesByGenre($moviesData, $searchQuery)
{
    $filteredMovies = array_filter($moviesData, function ($movie) use ($searchQuery) {
        return stripos($movie['genres'], $searchQuery) !== false;
    });
    return array_values($filteredMovies);
}

function searchMoviesByDirector($moviesData, $searchQuery)
{
    $filteredMovies = array_filter($moviesData, function ($movie) use ($searchQuery) {
        return stripos($movie['director'], $searchQuery) !== false;
    });
    return array_values($filteredMovies);
}


if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $isSearchByStudio = false;

    foreach ($moviesData as $movie) {
        if (stripos($movie['studio'], $searchQuery) !== false) {
            $isSearchByStudio = true;
            break;
        }
    }

    if ($isSearchByStudio) {
        $moviesData = searchMoviesByStudio($moviesData, $searchQuery);
    } else if ($isSearchByStudio) {
        $moviesData = searchMoviesByTitle($moviesData, $searchQuery);
    } else if ($isSearchByStudio) {
        $moviesData = searchMoviesByGenre($moviesData, $searchQuery);
    } else {
        $moviesData = searchMoviesByDirector($moviesData, $searchQuery);
    }
}
?>