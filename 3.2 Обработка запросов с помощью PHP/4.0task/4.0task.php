<?php

$n = rand(1, 10);
$count = 0; 
$text = ""; 
$nameErr = "";

if (isset($_REQUEST['Submit'])) { 
    $n = $_REQUEST['n'];
    $count = $_REQUEST['count'] + 1; 

    if (empty($_REQUEST["my_number"])) { 
        $nameErr = "Число обов'язкове для введення!";
    } else {
        $my_number = trim($_REQUEST["my_number"]);

        if (!preg_match("/^[1-9]|10$/", $my_number)) {
            $nameErr = "Дозволяється лише число від 1 до 10!";
        }
    }
    if ($nameErr === "") { 
        if ($my_number > $n) {
            $text = "Занадто багато!";
        } elseif ($my_number < $n) {
            $text = "Замало!";
        } else {
            $text = "<br/>Точно! Вгадано з $count спроби!<br/>";
        }
    }
}

//clear
if (isset($_POST['Clear'])){
    // я запутался в этом clear и решил добавить два способа(хотя по одельности они тоже работают)
    unset($_POST);
    $count = 0; 
}

?>
<p>Вгадай число от 1 до 10:</p>
<form action="<?=$_SERVER['PHP_SELF']?>" name="myform" method="POST">
    <input type="text" name="my_number" size="5"><?=$text?><?=$nameErr?><br />
    <input type="hidden" name="count" size="50" value="<?=$count?>">
    <input type="hidden" name="n" size="50" value="<?=$n?>">
    <input name="Submit" type="submit" value="submit"><br />
    <input name="Clear" type="submit" value="clear">
</form>