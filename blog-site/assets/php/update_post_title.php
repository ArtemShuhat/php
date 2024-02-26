<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "blog";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
	die("Connection error: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_id']) && isset($_POST['title'])) {
	$postId = $_POST['post_id'];
	$editedTitle = $_POST['title'];

	$updateTitleSql = "UPDATE posts SET title = '$editedTitle' WHERE post_id = $postId";

	if ($mysqli->query($updateTitleSql)) {
		echo "Success";
	} else {
		echo "Error updating title: " . $mysqli->error;
	}
}

$mysqli->close();
?>