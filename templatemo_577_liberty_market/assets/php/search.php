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
    $foundMovies = [];

    if (empty($foundMovies)) {
        $foundMovies = searchMoviesByTitle($moviesData, $searchQuery);
    }
    if (empty($foundMovies)) {
        $foundMovies = searchMoviesByStudio($moviesData, $searchQuery);
    }
    if (empty($foundMovies)) {
        $foundMovies = searchMoviesByGenre($moviesData, $searchQuery);
    }
    if (empty($foundMovies)) {
        $foundMovies = searchMoviesByDirector($moviesData, $searchQuery);
    }

    $moviesData = $foundMovies;
}
?>