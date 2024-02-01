function performSearch(event) {
			event.preventDefault()
			let input = document.getElementById("city").value;
			if (input.length > 0) {
				let xhr = new XMLHttpRequest();
				xhr.onreadystatechange = function () {
					if (xhr.readyState == 4 && xhr.status == 200) {
						document.getElementById("searchResults").innerHTML = xhr.responseText;
					}
				};
				xhr.open("GET", "search.php?city=" + encodeURIComponent(input), true);
				xhr.send();

				document.getElementById("searchResults").innerHTML = "";
			} else {
				document.getElementById("searchResults").innerHTML = "";
			}
}