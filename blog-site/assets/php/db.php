<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
	die("Connection failed: " . $mysqli->connect_error);
}

?>