<?php

/**
 *
 * All rights reserved Raeveen Pasupathy (InspectorGadget)
 * Unathorised Distribution could lead to a DMCA Takedown. This is a project for 'CodeForAsia'.
 * GitHub: https://github.com/InspectorGadget
 *
*/

class CourseHandler {

	public $courseTable = "course";

	public $storedSQL;

	## Course Name
	public $courseMeta = array(
		1 => "C1",
		2 => "C2",
		3 => "C3"
	);

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

	public function returnUserHandler() {
		return new UserHandler();
	}

	public function returnCourseName($courseID) {
		return isset($this->courseMeta[$courseID]) ? $this->courseMeta[$courseID] : "Course Not Found!";
	}

	public function usernameExist($username) {
		$sql = "SELECT * FROM $this->courseTable WHERE username = ?";
		$stmt = mysqli_stmt_init($this->storedSQL);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "Preparation Failed! : Course Table";
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			$store = mysqli_stmt_get_result($stmt);
			$row = mysqli_num_rows($store);

			if ($row > 0) {
				return true;
			} else {
				return false;
			}
		}
	}

	public function returnPreviousCompletedCourse($username) {
		$sql = "SELECT * FROM $this->courseTable WHERE username = ?";
		$stmt = mysqli_stmt_init($this->storedSQL);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "Preparation Failed! : Course Table";
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			$store = mysqli_stmt_get_result($stmt);

			if ($row = mysqli_fetch_assoc($store)) {
				return $row['course'];
			}
		}		
	}

	public function setAsFinished($username, $courseID, $marks) {
		$courseName = $this->returnCourseName($courseID);
		if ($this->usernameExist($username) !== true) {
			$sql = "INSERT INTO $this->courseTable(username, course, marks, enrolledOn) VALUES (?, ?, ?, ?)";
			$stmt = mysqli_stmt_init($this->storedSQL);

			$date = date("d/m/y");

			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "Preparation Failed! : Course setAsFinished";
			} else {
				mysqli_stmt_bind_param($stmt, "ssss", $username, $courseName, $marks, $date);
				$result = mysqli_stmt_execute($stmt);

				if ($result) {
					return true;
				} else {
					return false;
				}
			}
		} else {

			$prev = $this->returnPreviousCompletedCourse($username);
			$append = "$prev, $courseName";

			$sql = "UPDATE $this->courseTable SET course = ? WHERE username = ?";
			$stmt = mysqli_stmt_init($this->storedSQL);

			$date = date("d/m/y");

			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "Preparation Failed! : Course setAsFinished";
			} else {
				mysqli_stmt_bind_param($stmt, "ss", $append, $username);
				$result = mysqli_stmt_execute($stmt);

				if ($result) {
					return true;
				} else {
					return false;
				}
			}

		}
	}

}