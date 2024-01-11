<?php
include "db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$enteredUsername = $_POST['username'];
		$enteredPassword = $_POST['password'];

		$user = array_filter($accounts, function ($account) use ($enteredUsername) {
			return $account['username'] === $enteredUsername;
		});

		if (!empty($user) && reset($user)['password'] === $enteredPassword) {
			$userRole = reset($user)['role'];
			echo "Hello, $enteredUsername! You are logged in as an $userRole.</br> ";

			if ($userRole === 'admin') {
				echo "<p><u>You have the opportunity to view your profit in a modal window</u></p>";
			}
		} else {
			echo "Invalid username or password!";
		}
	} else {
		echo "Please enter username and password!";
	}
}
?>