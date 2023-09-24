<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Термометр</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            width: 30px;
        }
    </style>
</head>
<body>

<?php
$t = rand(-20, 20); 

echo "<table>";

for ($i = 20; $i >= -20; $i--) {
    $background_style = $i < $t ? "background: red;" : "background: yellow;";

    echo "<tr>";
    echo "<td>$i</td>";
    echo "<td style='$background_style'>$t</td>";
    echo "</tr>";
}

echo "</table>";
?>

</body>
</html>
