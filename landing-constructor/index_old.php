<?php
require "autoload.php";
$header = new Header("Заголовок Лендінгу");
$text = new Text("Це лендинг");
$model = new Model([$header, $text, $text], "Лендінг");
$str_land = $model->generate(); // генерація тексту лендинга
//echo $str_land;

$dir = "landing";
//mkdir($dir); // створення каталогу за вказаним шляхом
$f = fopen("{$dir}/index.html", "w+"); // створення файлу лендингу за вказаним шляхом
fwrite($f, $str_land); // запис в файл коду лендинга
fclose($f);
echo "Лендинг успішно створено!";
$zip = new ZipArchive(); // Створюємо об'єкт для роботи із ZIP-архівами
$arch = "landing.zip";
$zip->open($arch, ZIPARCHIVE::CREATE);
echo "Cтворюємо архів лендингу" . $arch;
$file1 = "{$dir}/index.html";
$zip->addFile($file1);
$zip->close(); // Завершуємо роботу з архівомecho "<a href=\"{$dir}/index.html\">Посмотреть результат</a>";