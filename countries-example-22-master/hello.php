<?php
ob_start();
include "header.php";
include "action.php";
echo "\n<h2>Secret information</h2>\n";

if (isset($_SESSION['authorized']) && $_GET["login"] == "admin") {
    $admin = $_GET["login"];
    if (check_log_admin($admin) == true) {
        echo "<p>Hello, $admin</p>";
        echo "<p>Weather</p>";
    }
} else {
    header("Location: index.php");
    ob_end_flush();
}
include "footer.php";