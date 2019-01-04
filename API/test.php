<?php
include 'EventHandler.php';

$api = new EventHandler();

var_dump($api->returnCourseHandler()->setAsFinished("admin", 1));