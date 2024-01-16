<?php
$library = array(
	array('title' => 'book 1', 'author' => 'author 1', 'year' => 2020),
	array('title' => 'book 2', 'author' => 'author 2', 'year' => 2019),
	array('title' => 'book 3', 'author' => 'author 3', 'year' => 2021),
);
$sLibrary = serialize($library);

$file = fopen('db.txt', 'w');
fwrite($file, $sLibrary);
fclose($file);

echo "Successful!";

?>