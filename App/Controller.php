<?php

namespace App;

class Controller {
	
	private $arg = array();
	
	public function view($file, $arg = null)
	{
		$arg = $arg;
		return include($file .'.php');
	}
	
}