<?php
include 'db.php';

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