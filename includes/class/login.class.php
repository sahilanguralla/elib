<?php

/*
 * this class manages login system
 */
class login{
	private $user;
	private $pass;
	private $rem;

    /**
     * @desc this class is used to login a user
     * @param <string> $user Username of the user
     * @param <string> $pass Password of the user
     * @param <boolean> $rem Remember login or not
     */
	function __construct($user,$pass,$rem){
		if(!empty($user) && !empty($pass) && !empty($rem)){
            $this->user=$user;
			$pass=new hash($pass);
            $this->pass=$pass->getHash();
			$this->rem=(bool) $rem;
		}
	}

    /**
     * This method function verifies login credentials from database and returns true/false. If false it initializes a $_SESSION['error']['login'] stating error in it
     * 
     * @param <object> $db mysqli database connection
     */
	function verify($db){
        $query=$db->query("SELECT * FROM `users` WHERE `username`='".$db->real_escape_string($this->user)."' AND `password`='".$db->real_escape_string($this->pass)."'");
		if($db->errno){
            $_SESSION['error']['login']="Error Code U0 : Internal Server Error!";
            return false;
        }
        else if($query->num_rows){
			$hash=new hash();
			$db->query("UPDATE `users` SET `login_hash`='".$db->real_escape_string($hash->getHash())."' WHERE `username`='".$db->real_escape_string($this->user)."'");
			if($db->errno){
                $_SESSION['error']['login']="Error Code U1 : Internal Server Error!";
				return false;
            }
            
			if($this->rem)
				setcookie('userId',$hash->getHash(),strtotime("+2 weeks"));
			else
				$_SESSION['userId']=$hash->getHash();
			return true;
		}
		else{
            $_SESSION['error']['login']="Invalid Username/Password combination!";
			return false;
        }
	}
    
    /*
     * This method function validates the submitted username, password and remember me
     * and return true/false. If false is returned, an additional $_SESSION['error']['loginVal'] is
     * initialized with error details
     */
    function validate(){
        $nameVal="/^\w+([\.\-]\w+)*$/";
        if(!preg_match($nameVal,$this->user) || strlen($this->user)<4)
            $_SESSION['error']['loginVal']="Invalid username entered!";
        else if(strlen($this->pass)<6)
            $_SESSION['error']['loginVal']="Invalid password entered";
        else if($this->rem!="true" && $this->rem!="false"){
            $this->rem="false";
            return true;
        }
        else
            return true;
        return false;
    }
}