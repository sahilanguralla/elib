<?php

	class db_connect{
		public $mysql_host;
		public $mysql_user;
		public $mysql_pass;
		public $mysql_db;
		public $conn;

		function __construct($host,$user,$pass,$db){
			$this->mysql_host = $host;
			$this->mysql_user = $user;
			$this->mysql_pass = $pass;
			$this->mysql_db = $db;
		}
	
		function db_connect(){
			$this->conn=mysqli_connect($this->mysql_host, $this->mysql_user, $this->mysql_pass, $this->mysql_db);
			try {
				if(!$this->conn){
					throw new Exception('Connecting to Database.');
				} else {
					echo 'Connected.';
				}
			} catch (Exception  $ex){
				echo 'Error: '.$ex->getMessage();
			}
			
		}
	}

?>