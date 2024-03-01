<?php
include 'db.php';

// ВВОДИТЬ ИМЯ АДМИНА И ПАРОЛЬ НУЖНО САМОСТОЯТЕЛЬНО
$adminName = "admin2";
$adminPassword = "admin2";
$role = "admin";

$hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);
$insertUserQuery = "INSERT INTO usersdb (username, password, role) VALUES ('$adminName', '$hashedPassword', '$role')";

if ($mysqli->query($insertUserQuery) === TRUE) {
	echo "New admin record created successfully";
} else {
	echo "Error: " . $insertUserQuery . "<br>" . $mysqli->error;
}
$mysqli->close();
?>