<?php
include '../API/EventHandler.php';
session_start();

$api = new EventHandler();

if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['email'])) {
	echo "Unathorised! Nice try :D";
	exit();
} else {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$bool = $api->returnUserHandler()->register($username, $password, $email);

	if ($bool === true) {
		header("Location: ../login.php?message=created");
	} else if ($bool === false) {
		header("Location:../register.php?message=error");
	} else if ($bool === "User Exists") {
		header("Location:../register.php?message=exist");
	}
}