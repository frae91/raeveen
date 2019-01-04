<?php
include '../API/EventHandler.php';

$api = new EventHandler();

if (!isset($_POST['total']) || !isset($_POST['correct']) || !isset($_POST['username']) || !isset($_POST['course'])) {
	echo "Nice try!";
	exit();
} else {
	$total = $_POST['total'];
	$correct = $_POST['correct'];
	$username = $_POST['username'];
	$course = $_POST['course'];
	$percentage = ($correct / $total) * 100;
	if ($percentage >= 50) {
		$api->returnCourseHandler()->setAsFinished($username, $course);
	} else {
		header("Location: ../index.php/?message=failed");
	}
}