<?php

namespace App\Controllers;

use App\Models\Pages;
use App\Models\Hotels;
use App\Controller;
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