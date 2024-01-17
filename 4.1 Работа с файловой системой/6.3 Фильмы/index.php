<?php
$url = 'https://www.themoviedb.org/movie?language=ru';
$html = file_get_contents($url);

$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
libxml_use_internal_errors(false);


echo '<table border="1">';
echo '<tr><th>Date</th><th>Title</th></tr>';

$cardElements = $dom->getElementsByTagName('div');
foreach ($cardElements as $cardElement) {
    if ($cardElement->getAttribute('class') === 'card style_1') {
        $filmTitle = $cardElement->getElementsByTagName('h2')->item(0)->textContent;
        $filmId = $cardElement->getElementsByTagName('p')->item(0)->textContent;

        echo "<tr><td>$filmId</td><td>$filmTitle</td></tr>";
    }
}
echo '</table>';


?>