<?php

namespace App\Controllers;

use App\Models\Hotels;
use App\Controller;
class MainController {
	
	public function index()
	{
		$hotel =  Hotels::index();
		return Controller::view('view/index', $hotel);
		
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