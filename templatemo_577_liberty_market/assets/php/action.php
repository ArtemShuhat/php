<?php
include "db.php";

//directors
function SortDirectors($a, $b)
{
  if ($a["director"] < $b["director"]) {
    return -1;
  } elseif ($a["director"] == $b["director"]) {
    return 0;
  } else {
    return 1;
  }
}

function SortGenres($a, $b)
{
  $genresA = explode(', ', $a['genres']);
  $genresB = explode(', ', $b['genres']);

  $firstGenreA = $genresA[0];
  $firstGenreB = $genresB[0];

  if ($firstGenreA === $firstGenreB) {
    return strcmp($a['genres'], $b['genres']);
  } else {
    return strcmp($firstGenreA, $firstGenreB);
  }
}

function SortRating($a, $b)
{
  if ($a['rating'] == $b['rating']) {
    return 0;
  }
  return ($a['rating'] > $b['rating']) ? -1 : 1;
}

function sortSessionTime($a, $b)
{
  $timeA = strtotime($a['session_time']);
  $timeB = strtotime($b['session_time']);

  if ($timeA == $timeB) {
    return 0;
  }
  return ($timeA < $timeB) ? -1 : 1;
}

function sortPriceTicket($a, $b)
{
  if ($a['random_ticket'] == $b['random_ticket']) {
    return 0;
  }
  return ($a['random_ticket'] < $b['random_ticket']) ? -1 : 1;
}

function SortStudio($a, $b)
{
  $studioA = explode(', ', $a['studio']);
  $studioB = explode(', ', $b['studio']);

  $firstStudioA = $studioA[0];
  $firstStudioB = $studioB[0];

  if ($firstStudioA === $firstStudioB) {
    return strcmp($a['studio'], $b['studio']);
  } else {
    return strcmp($firstStudioA, $firstStudioB);
  }
}
?>