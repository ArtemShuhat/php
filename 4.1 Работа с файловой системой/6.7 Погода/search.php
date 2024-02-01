<?php
if (isset($_GET["city"])) {
	$input = $_GET["city"];

	if (!empty($input)) {
		$apiKey = "31328fe71fa819bb634bb49e609a5633";
		$unsplashApiKey = "UxSPhOvnIsGBSFqJVmXDpFnvkfrgBxMRruApLt2cJVc";

		$currentWeatherUrl = "http://api.openweathermap.org/data/2.5/weather?q=$input&units=metric&appid=$apiKey";
		$forecastUrl = "http://api.openweathermap.org/data/2.5/forecast?q=$input&appid=$apiKey";
		$unsplashApiUrl = "https://api.unsplash.com/photos/random?query=$input&client_id=$unsplashApiKey";

		$unsplashResponse = @file_get_contents($unsplashApiUrl);
		$currentWeatherResponse = @file_get_contents($currentWeatherUrl);
		$forecastResponse = @file_get_contents($forecastUrl);

		if ($currentWeatherResponse !== false && $forecastResponse !== false) {
			$currentWeatherData = json_decode($currentWeatherResponse, true);
			$unsplashData = json_decode($unsplashResponse, true);
			$forecastData = json_decode($forecastResponse, true);

			$temperature = $currentWeatherData["main"]["temp"];
			if ($temperature < 0) {
				$roundedTemperature = round($temperature, 1);
			} else {
				$roundedTemperature = round($temperature);
			}
			$description = isset($currentWeatherData["weather"][0]["description"]) ? $currentWeatherData["weather"][0]["description"] : "no data";
			$pressure = isset($currentWeatherData["main"]["pressure"]) ? $currentWeatherData["main"]["pressure"] : "no data";
			$windSpeed = isset($currentWeatherData["wind"]["speed"]) ? $currentWeatherData["wind"]["speed"] : "no data";

			echo "<div id='CityAndTemp' class='flex items-center justify-between p-20'>";
			echo "<p class='text-6xl font-normal'>$input</p>";
			echo "<p class='text-7xl font-extralight'>$roundedTemperature °C</p>";
			echo "</div>";
			echo "<div class='moreInfo mx-auto text-center'>";
			echo "<p class='text-xl'>Description: $description</p>";
			echo "<p class='text-xl'>Atmosphere pressure: $pressure hPa</p>";
			echo "<p class='text-xl'>Wind speed: $windSpeed m/s</p>";
			echo "</div>";

			if (!empty($unsplashData['urls']['regular'])) {
				$photoUrl = $unsplashData['urls']['regular'];
				echo "<img src='$photoUrl' alt='City Photo' class='city-photo pt-12 pb-8 block'>";
			}

			if (!empty($forecastData) && is_array($forecastData['list'])) {
				echo "<p class='flex justify-center text-xl m-8'>5-Day Weather Forecast for $input:</p>";
				$prevDay = '';
				echo "<div class='grid grid-cols-2 gap-4'>";
				foreach ($forecastData['list'] as $forecast) {
					$date = date('Y-m-d', $forecast['dt']);
					$hour = (int) date('H', $forecast['dt']);
					$temperature = $forecast['main']['temp'];
					$description = $forecast['weather'][0]['description'];
					$temperatureCelsius = $temperature - 273.15;

					if ($temperatureCelsius < 0) {
						$roundedTemperatureCelsius = round($temperatureCelsius, 1);
					} else {
						$roundedTemperatureCelsius = round($temperatureCelsius);
					}
					if ($date !== $prevDay) {
						echo "<div class='flex md:w-full p-2 md:p-6 pl-0 justify-center'>";
						echo "<div class='flex flex-col items-center bg-white dark:bg-black shadow-lg py-6 px-9 rounded-lg justify-center transition-all hover:translate-y-5'>";
						echo "<p class='text-lg font-semibold mb-2'>$date</p>";
						echo "<p class='text-sm'>$description</p>";
						echo "<p class='text-3xl font-bold'>{$roundedTemperatureCelsius}°C</p>";
						$svgFileName = '';
						switch ($description) {
							// *************** CLOUDS START ***************
							case 'overcast clouds':
								$svgFileName = 'OvercastClouds.svg';
								break;
							case 'broken clouds':
								$svgFileName = 'BrokenClouds.svg';
								break;
							case 'few clouds':
								$svgFileName = 'FewClouds.svg';
								break;
							case 'clear sky':
								$svgFileName = 'ClearSky.svg';
								break;
							case 'scattered clouds':
								$svgFileName = 'ScatteredClouds.svg';
								break;
							// *************** CLOUDS END ***************

							// *************** RAIN START ***************
							case 'light rain':
								$svgFileName = 'LightRain.svg';
								break;
							case 'extreme rain':
								$svgFileName = 'ExtremeRain.svg';
								break;
							case 'moderate rain':
							case 'heavy intensity rain':
							case 'very heavy rain':
							case 'freezing rain':
							case 'light intensity shower rain':
							case 'shower rain':
							case 'heavy intensity shower rain':
							case 'ragged shower rain':
								$svgFileName = 'Rain.svg';
								break;
							// *************** RAIN END ***************

							// *************** SNOW START ***************
							case 'light snow':
								$svgFileName = 'LightSnow.svg';
								break;
							case 'snow':
							case 'heavy snow':
							case 'sleet':
							case 'light shower sleet':
							case 'shower sleet':
							case 'light rain and snow':
							case 'rain and snow':
							case 'light shower snow':
							case 'shower snow':
							case 'heavy shower snow':
								$svgFileName = 'Snow.svg';
								break;
							// *************** SNOW END ***************

							// *************** THUNDERSTORM START ***************
							case 'thunderstorm with light rain':
							case 'thunderstorm with rain':
							case 'thunderstorm with heavy rain':
							case 'light thunderstorm':
							case 'thunderstorm':
							case 'heavy thunderstorm':
							case 'ragged thunderstorm':
							case 'thunderstorm with light drizzle':
							case 'thunderstorm with drizzle':
							case 'thunderstorm with heavy drizzle':
								$svgFileName = 'Thunderstorm.svg';
								break;
							// *************** THUNDERSTORM END ***************

							// *************** DRIZZLE START ***************
							case 'light intensity drizzle':
							case 'drizzle':
							case 'heavy intensity drizzle':
							case 'light intensity drizzle rain':
							case 'drizzle rain':
							case 'heavy intensity drizzle rain':
							case 'shower rain and drizzle':
							case 'heavy shower rain and drizzle':
							case 'shower drizzle':
								$svgFileName = 'LightRain.svg';
								break;
							// *************** DRIZZLE END ***************

							// *************** ATMOSPHERE START ***************
							case 'mist':
							case 'smoke':
							case 'haze':
							case 'fog':
								$svgFileName = 'Mist.gif';
								break;
							case 'sand/dust whirls':
							case 'sand':
							case 'dust':
							case 'volcanic ash':
							case 'squalls':
							case 'tornado':
								$svgFileName = 'Tornado.png';
								break;
							// *************** ATMOSPHERE END ***************
							default:
								$svgFileName = 'default.svg';
						}
						echo "<img src='./icons/$svgFileName' alt='Weather Icon'>";
						echo "</div>";
						echo "</div>";
					}
					$prevDay = $date;
				}
				echo "</div>";
			} else {
				echo "<p>No forecast data available.</p>";
			}

		} else {
			echo "<p>Error while retrieving current weather data or forecast data.</p>";
		}
	}
}
?>