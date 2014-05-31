<?php
	require_once 'encrypt.class.php';
class authenticate{
		public $_username;
		public $_password;
		private $flag;
		
		function front_end_validation($username, $password){
			if(isset($_POST[$username])&&isset($_POST[$password])){
				$this->_username = $_POST['name'];
				$this->_password = $_POST['password'];
				
				if(!empty($this->_username)&&!empty($this->_password)){
					echo 'ok all fields are filled';
					$this->flag=1;
					return $this->flag;
				}else{
					echo 'Please fill all the fields';
					$this->flag=0;
					return $this->flag;
				}
			}
			else
				$this->flag=0;
		}

		function db_xconfirm(db_connect $a){
			$this->_password;
			$encrypt = new encrypt();
			$this->_password = $encrypt->encrypt_pass($this->_password); 
			$query = "SELECT `id` FROM `authentication` WHERE `username`='{$this->_username}' AND `password`='{$this->_password}' ORDER BY `id` ";
			$query_run = mysqli_query($a->conn,$query);
			$query_num_rows = mysqli_num_rows($query_run);

			try{
				if(!$query_run){
					throw new Exception('Query Failed');
				}
			} catch (Exception $ex){
				echo 'Error: '.$ex->getMessage();
			}

			try{
				if($query_num_rows==0){
					throw new Exception('Invalid username/password combination');
				} else{
					echo 'Okay password';
				}
			} catch(Exception $ex){
					echo 'Error: '.$ex->getMessage();
			}
			
		}
	}
?>