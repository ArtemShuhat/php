<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .thermometer {
            width: 100px;
            height: 400px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            position: relative;
            margin: 20px auto;
            border-radius: 10px;
        }
        .temperature {
            text-align: center;
            margin-top: 10px;
            font-size: 20px;
        }
        .mercury {
            background-color: #ff0000;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 0;
            transition: height 0.5s;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <?php
$random_temperature = mt_rand(360, 410) / 10;

$result = ($random_temperature < 37.7) ? "Здоров!"
: (($random_temperature == 37.7) ? "Что-то нездоровится…"
    : "Болен!");

echo "<div style='color: brown; font-size: 24px; text-align: center;'>$result</div>";
?>


    <div class="thermometer">
        <div class="temperature"><?php echo $random_temperature; ?></div>
        <div class="mercury"></div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let mercury = document.querySelector('.mercury');
            let temperatureValue = <?php echo $random_temperature; ?>;

            function updateMercuryHeight() {
                let maxTemperature = 42;
                let minTemperature = 35;
                let height = (temperatureValue - minTemperature) / (maxTemperature - minTemperature) * 100;
                mercury.style.height = height + '%';
            }

            updateMercuryHeight();
        });
    </script>
</body>
</html>
