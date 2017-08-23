<?php

namespace App\Controllers;

use App\Controller;

class MainController {
	
	public function index()
	{
		$arg = "Hello World";
		return Controller::view('view/index', $arg);
		
	}
	
	public function about()
	{
		return Controller::view('view/index');
	}
	
	public function contact()
	{
		return Controller::view('view/header');
	}
	
	
}