<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!isset($_SESSION['username'])) {
		echo "You are not logged in. Please log in to create a post.";
		exit();
	}

	$postTitle = $_POST['postTitle'];
	$postContent = $_POST['postContent'];
	$category = $_POST['categorySelect'];
	//dsds
	$sql = "INSERT INTO posts (title, content, creator, category) VALUES (?, ?, ?, ?)";
	$stmt = $mysqli->prepare($sql);

	if ($category === "Other category") {
		$otherCategory = $_POST['otherCategory'];
		$stmt->bind_param("ssss", $postTitle, $postContent, $_SESSION['username'], $otherCategory);
	} else {
		$stmt->bind_param("ssss", $postTitle, $postContent, $_SESSION['username'], $category);
	}

	if ($stmt->execute()) {
		echo "Post successfully created!";
		$stmt->close();
		$mysqli->close();
		header("Location: ../../index.php");
		exit();
	} else {
		echo "Error: " . $stmt->error;
	}

	$stmt->close();
	$mysqli->close();
} else {
	echo "Form not submitted.";
}
?>