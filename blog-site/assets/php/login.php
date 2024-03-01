<?php
session_start();
include 'db.php';

$loginMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$username = mysqli_real_escape_string($mysqli, $username);

	$checkUserQuery = "SELECT * FROM usersdb WHERE username = '$username'";
	$result = $mysqli->query($checkUserQuery);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$hashedPassword = $row["password"];

		if (password_verify($password, $hashedPassword)) {
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			header("Location: ../../index.php");
			exit();
		} else {
			$loginMessage = "Incorrect password.";
		}
	} else {
		$loginMessage = "User not found.";
	}
}

$mysqli->close();
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
			<h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
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
						<div class="text-sm">
							<a href="#" class="font-semibold text-gray-600 hover:text-gray-400">Forgot password?</a>
						</div>
					</div>
					<div class="mt-2">
						<input id="password" name="password" type="password" autocomplete="current-password" required
							class="block py-2 px-3 w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black-200 sm:text-sm sm:leading-6">
					</div>
				</div>

				<div>
					<button type="submit"
						class="flex w-full justify-center rounded-md bg-gray-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Sign
						in</button>
				</div>
			</form>

			<p class="mt-10 text-center text-sm text-gray-500">
				No account?
				<a href="./sign_up.php" class="font-semibold leading-6 text-gray-600 hover:text-gray-500">Register
					here</a>
			</p>
			<p class="mt-10 text-center text-xl text-black-500">
				<?php echo $loginMessage ?>
			</p>
		</div>
	</div>
</body>

</html>