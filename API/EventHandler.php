<?php

/**
 *
 * All rights reserved Raeveen Pasupathy (InspectorGadget)
 * Unathorised Distribution could lead to a DMCA Takedown. This is a project for 'CodeForAsia'.
 * GitHub: https://github.com/InspectorGadget
 *
*/

require 'UserHandler.php';
require 'CourseHandler.php';

class EventHandler {

	public function __construct() { }

	public function parseConfig() {
		$data = json_decode(file_get_contents(dirname(__FILE__) . "\connection.json"), true);
		return $data;
	}

	public function returnUserHandler() {
		return new UserHandler($this->parseConfig()['host'], $this->parseConfig()['username'], $this->parseConfig()['password'], $this->parseConfig()['database']);
	}

	public function returnCourseHandler() {
		return new CourseHandler($this->parseConfig()['host'], $this->parseConfig()['username'], $this->parseConfig()['password'], $this->parseConfig()['database']);
	}	

}
