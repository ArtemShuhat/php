<?php
include "db.php";

//directors
function directors($a, $b)
{
  if ($a["director"] < $b["director"]) {
    return -1;
  } elseif ($a["director"] == $b["director"]) {
    return 0;
  } else {
    return 1;
  }
}

function sortByFirstGenre($a, $b)
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






?>