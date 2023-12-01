<?php
include "action.php";
include "header.php";

if (isset($_POST["go"])) {
    $login = $_POST["login"];
    $password = $_POST["pass"];
    $_SESSION["login"] = $login;
    $_SESSION["password"] = $password;
    if (add_user($login, $password)) {
        echo "Hello, $login!";

    } else {
        echo "exist!";
    }

}

if (!isset($_SESSION['authorized'])) {
    $str_form = '
<div class="container">
  <h3 class= "my-2">Sign in:</h3>
  <form class="form-inline" action="' . $_SERVER['PHP_SELF'] . '" method="post" onsubmit="return verify(this)">
    <label for="login" class="m-2">Login:</label> <input type="text" name="login" class="form-control my-2" id="login" placeholder="Enter login">
    <label for="pass" class="m-2">Password:</label> <input type="password" name="pass" id="pass" class="form-control my-2" placeholder="Enter password" >
    <input type="submit" value="OK" name="go" class="btn btn-secondary m-2">
  </form>
  <span id="massage"></span>
</div>';
    echo $str_form;
} else {
    echo "<p>You are registered as {$_SESSION["login"]}</p>";
    echo '<br><a href="logout.php">logout</a>';
}

include "footer.php";