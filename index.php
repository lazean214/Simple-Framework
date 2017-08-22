<?php
//Initialize Session
session_start();
//Initialize Autoload
require_once 'bootstrap/autoload.php';

use App\Libraries\Route;
use App\Models\Hotels;
use App\Controllers\MainController;
use App\Controllers\PageController;
use App\Controllers\HotelController;

$route = new Route;

$route->add('/', function() {
	//echo 'HOME';
	MainController::index();
});

$route->add('/about', function() {
	PageController::view('about');
});

$route->add('/contact', function() {
	PageController::view('contact');
});

$route->add('/hotels', function() {
	HotelController::index();
});

$route->add('/hotels/.+/.+', function($first, $second) {
	HotelController::view($first);
});

//Generic Guide
$route->add('/name', function() {
	echo 'Name Home';
});

$route->add('/name/.+', function($name) {
	echo "Name $name";
});


$route->add('/this/is/the/.+/story/of/.+', function($first, $second) {
	echo "This is the $first story of $second";
});


$route->submit();
