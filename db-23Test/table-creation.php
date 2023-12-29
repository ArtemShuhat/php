<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "dbtest";
// Створення з'єднання
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Перевірка з'єднання
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// запит SQL для створення таблиці
$sql = "CREATE TABLE MyGuests (
id INT AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(255) NOT NULL,
lastname VARCHAR(255) NOT NULL,
email VARCHAR(255),
reg_date TIMESTAMP
)";
if (mysqli_query($conn, $sql)) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>