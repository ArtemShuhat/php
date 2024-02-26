<?php
require "../autoload.php";

class Controller
{
	private $dir;

	public function __construct($dir)
	{
		$this->dir = $dir;

		if (!is_dir($this->dir)) {
			mkdir($this->dir); // створення каталогу 'landing'
		}
	}

	public function action()
	{
		$blocks = [];
		ob_start();
		/* створення блоків */
		if ($_POST['header']) {
			$header = new Header($_POST['header'], $img);
			$blocks[] = $header;
		}
		if ($_POST['text']) {
			$text = new Text($_POST['text']);
			$blocks[] = $text;
		}
		/* створення модели */
		if ($_POST['title']) {
			$model = new Model($blocks, $_POST['title']);
		} else {
			$model = new Model($blocks);
		}

		/* Робота с моделлю */
		$str_land = $model->generate(); // генерація тексту лендинга
		$path = "{$this->dir}/index.html";
		$f = fopen($path, "w+"); // створення файлу лендинга по вказаному шляху
		fwrite($f, $str_land); // запис в файл лендингу
		fclose($f);

		header("Location: ../index.php");
		ob_flush();
	}
}

$controller = new Controller('../landing');
$controller->action();