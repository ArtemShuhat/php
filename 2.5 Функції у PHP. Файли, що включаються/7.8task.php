<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function salaryJunior($baseSalary) {
        return $baseSalary * 0.8;
    }
    
    function salaryMiddle($baseSalary) {
        return $baseSalary;
    }
    
    function salarySenior($baseSalary) {
        return $baseSalary * 1.2;
    }
    
    function calculateSalary($position, $baseSalary) {
        $functionName = 'salary' . ucfirst($position);
        if (function_exists($functionName)) {
            return call_user_func($functionName, $baseSalary);
        } else {
            return "error";
        }
    }
    
    $positions = ['junior', 'middle', 'senior'];
    
    foreach ($positions as $position) {
        $salary = calculateSalary($position, 50000);
        echo "Зарплата для должности $position: $salary грн.<br>";
    }
    
    
    
    ?>
</body>
</html>