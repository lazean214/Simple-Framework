<?php
namespace App\Models;

use App\Libraries\Database;
use \PDO;

class Hotels extends Database {
	
	public static function index()
	{
		$conn = new Database;
		if($conn){
			$qry = $conn->prepare("SELECT * FROM hotels LIMIT 5");
			$qry->execute();
			$result=$qry->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
	}
	
	
	
}