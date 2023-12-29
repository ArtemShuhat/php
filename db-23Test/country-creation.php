<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbtest";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
try {
    $conn->query("SET NAMES utf8mb4");
    $conn->query("SET CHARACTER SET utf8mb4");
    $conn->set_charset('utf8mb4');
    $conn->query("CREATE TABLE countries (country_id INT NOT NULL AUTO_INCREMENT, country_name VARCHAR(255), country_area INT, PRIMARY KEY (country_id));");
    $conn->query("CREATE TABLE cities (city_name VARCHAR(255), city_population INT, country_id INT);");
    $conn->query("ALTER TABLE countries ADD COLUMN capital VARCHAR(255);");

    $conn->query("INSERT INTO countries (country_name, country_area, capital) VALUES ('Украина', 603628, 'Киев');");
    $conn->query("INSERT INTO countries (country_name, country_area, capital) VALUES ('Германия', 357021, 'Берлин');");
    $conn->query("INSERT INTO countries (country_name, country_area, capital) VALUES ('Франция', 674685, 'Марсель');");
    $conn->query("UPDATE countries SET capital = 'Париж' WHERE country_name ='Франция';");

    $conn->query("INSERT INTO cities VALUES ('Марсель', 839043, 3);");
    $conn->query("INSERT INTO cities (city_name, city_population, country_id) VALUES ('Гамбург', 1794453, 2);");
    $conn->query("INSERT INTO cities (city_name, city_population, country_id) VALUES ('Харьков', 1452228, 1);");
    $conn->query("INSERT INTO cities (city_name, city_population, country_id) VALUES ('Мюнхен', 1447614, 2);");
    $conn->query("INSERT INTO cities (city_name, city_population, country_id) VALUES ('Киев', 2848014, 1);");
    $conn->query("INSERT INTO cities (city_name, city_population, country_id) VALUES ('Берлин', 3479740, 2);");
    $conn->query("INSERT INTO cities (city_name, city_population, country_id) VALUES ('Париж', 2243833, 3);");

    mysqli_close($conn);
} catch (Exception $e) {
    $e->getMessage();
}