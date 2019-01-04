<?php
include '../API/EventHandler.php';
session_start();

$api = new EventHandler();

if (!isset($_POST['username']) || !isset($_POST['password'])) {
	echo "Unathorised! Nice try :D";
	exit();
} else {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$bool = $api->returnUserHandler()->login($username, $password);

	if ($bool) {
		$_SESSION['username'] = $username;
		header("Location: ../dashboard");
	} else {
		header("Location:../login.php?message=incorrect");
	}
}
