<?php
require '../../shd/simple_html_dom.php';

$url = 'https://www.foxtrot.com.ua/ru/shop/kharkov/mobilnye_telefony_smartfon.html';
$html = file_get_html($url);

$csvFile = fopen('smartphones.csv', 'w');

foreach ($html->find('.card') as $card) {
	$model = $card->find('.card__title', 0)->plaintext;
	$price = trim($card->find('.card-price', 0)->plaintext);
	fputcsv($csvFile, [$model, $price]);
}
fclose($csvFile);
echo 'Data successfully written to smartphones.csv';
?>