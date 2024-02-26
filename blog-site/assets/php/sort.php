<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "blog";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
	die("Connection failed: " . $mysqli->connect_error);
}

// Функция для выполнения запроса
function executeQuery($mysqli, $query)
{
	$result = $mysqli->query($query);

	if ($result) {
		return $result;
	} else {
		die("Error executing query: " . $mysqli->error);
	}
}

$sortOption = isset($_GET['sort_option']) ? $_GET['sort_option'] : 'Latest';

// Определение SQL-запроса в зависимости от выбора пользователя
if ($sortOption === 'Latest') {
	$sql = "SELECT * FROM posts ORDER BY created_at DESC";
} elseif ($sortOption === 'Categories') {
	$sql = "SELECT * FROM posts ORDER BY category ASC";
} else {
	$sql = "SELECT * FROM posts ORDER BY created_at DESC";
}

$result = executeQuery($mysqli, $sql);

// Вывод постов в HTML-формате
while ($row = $result->fetch_assoc()) {
	// Выводите данные постов в соответствии с вашими требованиями
	include './public_post.php';
}
?>