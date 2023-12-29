<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbtest";
// Створення з'єднання 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO MyGuests (firstname, lastname, email) 
 VALUES ('Nicol', 'Kidman', 'nicol@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email) 
 VALUES ('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email) 
 VALUES ('Julie', 'Dooley', 'julie@example.com')";
if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();