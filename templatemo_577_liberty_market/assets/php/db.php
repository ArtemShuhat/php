<?php
$apiUrl = 'https://api.themoviedb.org/3/movie/popular?api_key=6a03967de01dd651899816505c69cd39&language=en-US&page=1';
$apiKey = '6a03967de01dd651899816505c69cd39';
$moviesData = [];


$apiData = file_get_contents($apiUrl);
$movies = json_decode($apiData, true);

foreach ($movies['results'] as $movie) {
    $movieDetailsUrl = 'https://api.themoviedb.org/3/movie/' . $movie['id'] . '?api_key=' . $apiKey . '&language=en-US';
    $movieDetails = json_decode(file_get_contents($movieDetailsUrl), true);


    // *** Genres Start ***
    $genresUrl = 'https://api.themoviedb.org/3/genre/movie/list?api_key=' . $apiKey . '&language=en-US';
    $genresData = json_decode(file_get_contents($genresUrl), true);
    $genresMap = [];

    if (isset($genresData['genres']) && is_array($genresData['genres'])) {
        foreach ($genresData['genres'] as $genre) {
            $genresMap[$genre['id']] = $genre['name'];
        }
    }
    $genres = [];
    foreach ($movie['genre_ids'] as $genreId) {
        if (isset($genresMap[$genreId])) {
            $genres[] = $genresMap[$genreId];
        }
    }
    // *** Genres End ***


    // *** Poster Start ***
    $poster = isset($movie['poster_path']) ? 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] : 'Нет данных о постере';
    // *** Poster End ***


    //*** Directors Start ***
    $movieCreditsUrl = 'https://api.themoviedb.org/3/movie/' . $movie['id'] . '/credits?api_key=' . $apiKey;
    $movieCreditsData = json_decode(file_get_contents($movieCreditsUrl), true);
    if (isset($movieCreditsData['crew'])) {
        $directors = [];

        foreach ($movieCreditsData['crew'] as $crewMember) {
            if ($crewMember['job'] === 'Director') {
                $directors[] = $crewMember['name'];
            }
        }

        $director = (!empty($directors)) ? implode(', ', $directors) : 'Информация о режиссерах недоступна';
    } else {
        $director = 'Информация о режиссерах недоступна';
    }
    //*** Directors End ***


    //*** ReleaseYear Start ***
    $releaseYear = isset($movie['release_date']) ? substr($movie['release_date'], 0, 4) : 'Нет данных о годе выпуска';
    //*** ReleaseYear End ***


    //*** overview Start ***
    $overview = isset($movieDetails['overview']) ? $movieDetails['overview'] : 'Описание недоступно';
    //*** overview End ***


    //*** Rating Start ***
    $rating = isset($movieDetails['vote_average']) ? number_format($movieDetails['vote_average'], 1) : 'Рейтинг недоступен';
    //*** Rating End ***


    //*** Studio Start ***
    $productionCompanies = isset($movieDetails['production_companies']) ? $movieDetails['production_companies'] : [];
    $productionCompaniesList = [];

    foreach ($productionCompanies as $company) {
        $productionCompaniesList[] = $company['name'];
    }

    $studio = !empty($productionCompaniesList) ? implode(', ', $productionCompaniesList) : 'Информация о киностудии недоступна';
    //*** Studio End ***


    //*** Session date/time Start ***
    $randomHour = rand(10, 23); 
    $randomMinute = rand(0, 59); 
    $randomTime = sprintf('%02d:%02d', $randomHour, $randomMinute);
    $randomDate = date('Y-m-d'); 
    //*** Session date/time End ***


    //*** randomTicket Start ***
    $randomTicket = rand(20, 40); 
    //*** randomTicket End ***


    //*** randomTicket Start ***
    $randomPlace = rand(12, 40); 
    //*** randomTicket End ***


    //*** Discount Start ***
    $randNumDis = rand(0, 1);
    $discount = ($randNumDis == 1) ? rand(10, 25) : "No discount now";
    //*** Discount End ***

    

    $moviesData[] = [
        'title' => $movie['title'],
        'release_year' => $releaseYear,
        'poster_path' => $poster,
        'director' => $director,
        'genres' => implode(', ', $genres),
        'overview' => $overview,
        'rating' => $rating,
        'studio' => $studio,
        'session_date' => $randomDate,
        'session_time' => $randomTime,
        'random_ticket' => $randomTicket,
        'random_place' => $randomPlace,
        'discount' => $discount, 
    ];
}

  
?>
