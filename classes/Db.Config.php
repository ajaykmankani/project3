<?php
class Dbconnect{
	private $username="root";
	private $hostname="localhost";
	private $password="";
	private $db_name="stockben_db";
	public $con;
	
	public function __construct(){
			$this->connect();
		}
	private function connect(){
		try{
			$this->con=new PDO("mysql:host=$this->hostname;dbname=$this->db_name",$this->username,$this->password);// PDO connection
				$this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);// set the PDO error mode to exception
				
			}catch(PDOException $e){
				
				echo 'Connection Error With SQL:'.$e->getMessage();
			}
		}
		
		public function __destruct(){
			$this->con=null;
		}
	}
?>