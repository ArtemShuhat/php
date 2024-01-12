<?php
$file = fopen("poem.txt", "r");
$content = fread($file, filesize("poem.txt"));
fclose($file);

$orig_filename = "poem.txt";
$new_filename = "poem.html";
$status = rename($orig_filename, $new_filename) or exit("Невозможно переименовать файл");

$htmlContent = "<html>\n<head>\n<title>Мені тринадцятий минало...</title>\n</head>\n<body>\n<p>" . $content . "</p>\n</body>\n</html>";
$status = fopen("poem.html", "w");
fwrite($status, $htmlContent);
fclose($status);

echo $content;
?>