<?php
$v = "US";
if (isset($_POST['formSubmit'])) {
    $v = $_POST['formCountry'];
    $redir = "US.php";
    $country = "US";
    switch ($v) {
        case "US":
            $redir = "US.php";
            $country = "US";
            break;
        case "UK":
            $redir = "UK.php";
            $country = "UK";
            break;
        case "France":
            $redir = "France.php";
            $country = "France";
            break;
        case "Mexico":$redir = "Mexico.php";
            break;
        case "Japan":$redir = "Japan.php";
            break;
        default:echo ("Error!");exit();
            break;
    }
    header("Location: $redir?country=$country");
    exit();
}