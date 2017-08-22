<?php 

namespace App\Libraries;

use \PDO;

class Database extends PDO {
	
	protected $username = 'root';
	protected $serverName ='localhost';
	protected $dbname = 'betadb';
	protected $password = '';
	protected $dsn = 'mysql:dbname=micro_hotel;host=localhost';
	public function __construct(){
		try {
			parent:: __construct($this->dsn,$this->username,$this->password);
			// set the PDO error mode to exception
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "Connected successfully"; 
		}
		catch(PDOException $e)
		{
			return "Connection failed: " . $e->getMessage();
		}
	}
	
}