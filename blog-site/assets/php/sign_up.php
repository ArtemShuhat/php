<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$registrationMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$confirmPassword = $_POST["confirm_password"];

	$username = mysqli_real_escape_string($conn, $username);

	if ($password !== $confirmPassword) {
		$registrationMessage = "Passwords do not match.";
	} else {
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		$role = "user";

		$checkUserQuery = "SELECT * FROM usersdb WHERE username = '$username'";
		$result = $conn->query($checkUserQuery);

		if ($result->num_rows > 0) {
			$registrationMessage = "A user with this name is already registered.";
		} else {
			$insertUserQuery = "INSERT INTO usersdb (username, password, role) VALUES ('$username', '$hashedPassword', '$role')";

			if ($conn->query($insertUserQuery) === TRUE) {
				$_SESSION['id'] = $conn->insert_id;
				$_SESSION['username'] = $username;

				$registrationMessage = "Data has been successfully added to the database. You are now logged in.";
				header("Location: ../../index.php");
			} else {
				$registrationMessage = "Error: " . $insertUserQuery . "<br>" . $conn->error;
			}
		}
	}
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog</title>
	<link href="../css/style.css" rel="stylesheet">
</head>

<body style="background: #F3F4F6;">
	<a href="../../index.php">
		<img src="../images/lefts.png" class="ml-3 mt-2" alt="">
	</a>
	<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
		<div class="sm:mx-auto sm:w-full sm:max-w-sm">
			<img class="mx-auto h-10 w-auto" src="../images/logo.png">
			<h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign up a new
				account</h2>
		</div>

		<div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
			<form class="space-y-6" action="#" method="POST">
				<div>
					<label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
					<div class="mt-2">
						<input id="username" name="username" type="username" autocomplete="username" required
							class="block py-2 px-3 w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black-200 sm:text-sm sm:leading-6">
					</div>
				</div>

				<div>
					<div class="flex items-center justify-between">
						<label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
					</div>
					<div class="mt-2">
						<input id="password" name="password" type="password" autocomplete="current-password" required
							class="block py-2 px-3 w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black-200 sm:text-sm sm:leading-6">
					</div>
				</div>
				<div>
					<div class="flex items-center justify-between">
						<label for="confirm_password" class="block text-sm font-medium leading-6 text-gray-900">Confirm
							password</label>
					</div>
					<div class="mt-2">
						<input id="confirm_password" name="confirm_password" type="password"
							autocomplete="current-password" required
							class="block py-2 px-3 w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black-200 sm:text-sm sm:leading-6">
					</div>
				</div>

				<div>
					<button type="submit"
						class="flex w-full justify-center rounded-md bg-gray-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Sign
						up</button>
				</div>
			</form>

			<p class="mt-10 text-center text-sm text-gray-500">
				No account?
				<a href="./login.php" class="font-semibold leading-6 text-gray-600 hover:text-gray-500">Login
					here</a>
			</p>
		</div>
	</div>
</body>

</html>