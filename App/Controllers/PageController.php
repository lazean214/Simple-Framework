<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Pages;

class PageController {
	
	public function index()
	{
		$hotel =  Hotels::index();
		return Controller::view('view/index', $hotel);
		
	}
	
	public function view($slug)
	{
		$arg =  Pages::page($slug);
		return Controller::view('view/pages', $arg);
	}
	
	public function contact()
	{
		$hotel =  Pages::page('contact');
		return Controller::view('view/pages', $hotel);
	}
	
	
}