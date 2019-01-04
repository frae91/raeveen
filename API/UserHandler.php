<?php

/**
 *
 * All rights reserved Raeveen Pasupathy (InspectorGadget)
 * Unathorised Distribution could lead to a DMCA Takedown. This is a project for 'CodeForAsia'.
 * GitHub: https://github.com/InspectorGadget
 *
*/

class UserHandler {

	public $userTable = "users";

	public $storedSQL;

	public function __construct($host, $username, $password, $database) {
		$this->connectToSQL($host, $username, $password, $database); // Assigns the public VAR
	}

	public function connectToSQL($host, $username, $password, $database) {
		$connection = mysqli_connect($host, $username, $password, $database);
		if ($connection) {
			$this->storedSQL = $connection;
			return $connection;
		} else {
			echo "Unable to connect!" . mysqli_connect_error();
			exit();
		}
	}

	public function userExist($username) {
		$sql = "SELECT * FROM $this->userTable WHERE username = ?";
		$stmt = mysqli_stmt_init($this->storedSQL);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "Preparation Failed : User Check!";
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			$store = mysqli_stmt_get_result($stmt);
			$row = mysqli_num_rows($store);

			if ($row > 0) {
				return true; // Exist
			} else {
				return false;
			}
		}
	}

	public function register($username, $password, $email) {
		if ($this->userExist($username) !== true) {
			$sql = "INSERT INTO $this->userTable(username, password, email, created) VALUES (?, ?, ?, ?)";
			$stmt = mysqli_stmt_init($this->storedSQL);

			$createdOn = date("d/m/y");

			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "Preparation Failed : User register";
				exit();
			} else {
				mysqli_stmt_bind_param($stmt, "ssss", $username, $password, $email, $createdOn);
				$result = mysqli_stmt_execute($stmt);

				if ($result) {
					return true;
				} else {
					return false;
				}
			}
		} else {
			echo "User Exists";
		}
	}

	public function login($username, $password) {
		$sql = "SELECT * FROM $this->userTable WHERE username = ? AND password = ?";
		$stmt = mysqli_stmt_init($this->storedSQL);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "Preparation Failed! : User Login";
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "ss", $username, $password);
			mysqli_stmt_execute($stmt);
			$store = mysqli_stmt_get_result($stmt);
			$row = mysqli_num_rows($store);

			if ($row > 0) {
				return true; // Logged In!
			} else {
				return false;
			}
		}
	}

}