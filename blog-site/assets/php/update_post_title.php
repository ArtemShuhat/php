<?php
include 'db.php';

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