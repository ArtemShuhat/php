<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

// ВВОДИТЬ ИМЯ АДМИНА И ПАРОЛЬ НУЖНО САМОСТОЯТЕЛЬНО
$adminName = "admin2";
$adminPassword = "admin2";
$role = "admin";

$hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);
$insertUserQuery = "INSERT INTO usersdb (username, password, role) VALUES ('$adminName', '$hashedPassword', '$role')";

if ($conn->query($insertUserQuery) === TRUE) {
	echo "New admin record created successfully";
} else {
	echo "Error: " . $insertUserQuery . "<br>" . $conn->error;
}
$conn->close();
?>