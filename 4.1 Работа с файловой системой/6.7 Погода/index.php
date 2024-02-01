<?php
include "search.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Weather search</title>
	<link rel="stylesheet" href="./style.css">
	<!-- box icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
	<!-- Unicons -->
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
	<header class="bg-darkblue flex justify-center h-12 mb-6">
		<h1 class="text-4xl font-bold p-1 text-slate-300">Weather</h1>
	</header>

	<main>
		<div class="container mx-auto bg-slate-200 p-8 rounded-xl text-xl max-w-4xl">
			<form id="searchForm" class="" onsubmit="return performSearch(event)" method="GET">
				<div class="relative flex items-center">
					<input type="text" id="city" name="city" placeholder="Search for place"
						class="pl-8 pr-12 py-2 w-full rounded-full bg-gray-100">
					<i class='bx bx-search absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-400'></i>
					<i class='bx bx-map absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400'></i>
				</div>
			</form>
			<div id="searchResults"></div>
		</div>
	</main>
	<script src="script.js"></script>
</body>

</html>