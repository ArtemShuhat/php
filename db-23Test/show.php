<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbtest";
// Створення з'єднання 
$conn = new mysqli($servername, $username, $password, $dbname);
// Перевірка з'єднання  
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT firstname, lastname FROM MyGuests";
$result = $conn->query($sql);
$num = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $num++;
        echo "$n Name: " . $row["firstname"] . " " . $row["lastname"] . "\n<br>";
    }
} else {
    echo "0 results";
}
$conn->close();