<?php

class login{
	private $user;
	private $pass;
	private $rem;

    /**
     * @desc this class is used to login a user
     * @param $user <string> Username of the user
     * @param $pass <string> Password of the user
     * @param $rem <boolean> Remember login or not
     */
	function __construct($user,$pass,$rem){
		if(!empty($user) && !empty($pass) && !empty($rem)){
            $this->user=mysql_real_escape_string($user);
			$this->pass=mysql_real_escape_string($pass);
			$this->rem=(bool) $rem;
		}
	}

    /**
     * @desc This method function verifies login credentials from database
     * @param $db mysqli database connection
     */
	function verify($db){
        $db=$this->mysqli;
        $query=$db::query("SELECT * FROM `users` WHERE `username`=='{$this->user}' AND `password`='{$this->pass}'");
		if($db::$errno){
            $_SESSION['error']['login']="Error Code U0 : Internal Server Error!";
            return false;
        }
        else if($query::$num_rows){
			$hash=new hash();
			$db::query("UPDATE `users` SET `login_hash`='".$db::real_escape_string($this->getHash())."' WHERE `username`='{$this->user}'");
			if($db::errno()){
                $_SESSION['error']['login']="Error Code U1 : Internal Server Error!";
				return false;
            }
            
			if($this->rem)
				setcookie('userId',$hash->gethash(),strtotime("+2 weeks"));
			else
				$_SESSION['userId']=$hash->getHash();
			return true;
		}
		else{
            $_SESSION['error']['login']="Error Code U2 : Internal Server Error!";
			return false;
        }
	}
}

?>