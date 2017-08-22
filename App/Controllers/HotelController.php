<?php

namespace App\Controllers;

use App\Controller;
use App\Api;

class HotelController {
	
	public function index()
	{
		//session_destroy();
		$d1 = date('Y-m-d', strtotime(' + 3 days'));
		$d2 =  date('Y-m-d', strtotime(' + 4 days')); 
		$location = 'Dubai, United Arab Emirates';
		$var = $location .";".$d1.";".$d2.";2;0";
		$arg = Api::getHotels($var);
		return Controller::view('view/hotel-templates/listing', $arg);
	}
	
	public function view($arg)
	{
		$arg = $arg;
		return Controller::view('view/hotel-templates/view', $arg);
	}
	
}
