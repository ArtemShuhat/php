<?php
include_once 'db.php';
$error = "";
$login = "";

if (isset($_POST['Send'])){
    if (!preg_match('/^\w+$/', $_POST['login'])){
        $error = "login error";
    } else {
        $loginAttemptSuccessful = false; 

        for ($i=0; $i < count($accounts); $i++){
            if ($_POST['login'] === $accounts[$i]['login'] && $_POST['pass'] === $accounts[$i]['pass']){
                if ($accounts[$i]['role'] === 'admin') {
                    header("Location:admin.php?login={$_POST['login']}");
                } else if ($accounts[$i]['role'] === 'user') {
                    header("Location:user.php?login={$_POST['login']}");
                }
                $loginAttemptSuccessful = true;
            }
        }

        if (!$loginAttemptSuccessful) {
            $error = "invalid login or password";
        }
    }
}

if (isset($_POST['Clear'])){
    unset($_POST);
    header("Location:{$_SERVER['PHP_SELF']}");
    $login = ""; 
    $_POST['pass'] = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <input type="text" name="login" id="login" value="<?= $login ?>">
        <input type="password" name="pass" id="pass"><br>
        <input type="submit" name="Send" value="Send">
        <input type="submit" name="Clear" value="Clear">
    </form>

    <?php if ($error !== ""): ?>
        <p><?= $error ?></p>
    <?php endif; ?>
</body>
</html>