<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
// Створення з'єднання
$conn = new mysqli($servername, $username, $password);
// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Створення бази даних
$sql = "CREATE DATABASE dbtest CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();
?>