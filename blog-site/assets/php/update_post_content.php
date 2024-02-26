<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "blog";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
	die("Connection error: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_id']) && isset($_POST['content'])) {
	$postId = $_POST['post_id'];
	$editedContent = $_POST['content'];

	$updateContentSql = "UPDATE posts SET content = '$editedContent' WHERE post_id = $postId";

	if ($mysqli->query($updateContentSql)) {
		echo "Success";
	} else {
		echo "Error updating content: " . $mysqli->error;
	}
}

$mysqli->close();
?>