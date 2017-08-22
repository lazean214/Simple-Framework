<?php
namespace App\Models;

use App\Libraries\Database;
use \PDO;

class Pages extends Database {
	
	public static function page($slug)
	{
		$conn = new Database;
		if($conn){
			$qry = $conn->prepare("SELECT * FROM pages WHERE slug = '$slug'");
			$qry->execute();
			$result=$qry->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
	}
	
	
	
}