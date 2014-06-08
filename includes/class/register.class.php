<?php

class register{
	private $name;
	private $fname;
	private $password;
	private $confPassword;
	private $dept;
	private $rno;
	private $email;
        private $confEmail;
	private $phone;
	private $type;

	function __construct($type,$name,$fname,$password,$confPassword,$dept,$rno,$email, $confEmail,$phone){
            $this->name=strtolower($name);
            $this->fname=$fname;
            $this->password=$password;
            $this->confPassword=$confPassword;
            $this->dept=strtoupper($dept);
            $this->rno=strtoupper($rno);
            $this->email=strtolower($email);
            $this->confEmail=strtolower($confEmail);
            $this->phone=$phone;
            $this->type=(bool)$type;
	}

	function createUser($db,$confirm=false){
        if($this->validate($db)){
            include 'class/hash.class.php';
            $pass=new hash($this->password);
            $this->password=$pass->getHash();
            if($confirm && isset($_SESSION['user']) && (($this->type=="private" && $_SESSION['user']['rights'][1]>4) || ($this->type=="public" && $_SESSION['user']['rights'][1]>3))){
                $rights=$this->private?121111113:120001110;
                $db->query("INSERT INTO `users` (`username`,`password`,`private`,`dept`,`rno`,`phone`,`email`,`rights`,`moderator`,`toc`) VALUES ('{$this->name}','{$this->password}',{$this->type},'{$this->dept}','{$this->rno}','{$this->email}','$rights','{$_SESSION['user']}',CURRENT_TIMESTAMP)");
            }
            else if (!$confirm) {
                $moderator=isset($_SESSION['user'])?$_SESSION['user']['username']:"";
                $db->query("INSERT INTO `conf_users` (`username`,`password`,`private`,`dept`,`rno`,`phone`,`email`,`moderator`,`toc`) VALUES ('{$this->name}','{$this->password}','{$this->type}','{$this->dept}','{$this->rno}','{$this->phone}','{$this->email}','$moderator',CURRENT_TIMESTAMP)");
            }

            if($db->errno)
            {
                $_SESSION['error']['register']="Error Code R0: Internal Server Error!";
                return false;
            }
            return true;
        }
        else
            return false;
    }
    
    private function validate($db){
        $nameVal="/^\w+([\.\-]\w+)*$/";
        $fnameVal="/^[[:alpha:]]+( [[:alpha:]]+)*$/";
        $passwordVal="/^.{5}.+$/";
        $deptVal="/^[A-Z]{3}[A-Z]*$/";
        $rnoVal="/^\d{4}[A-Z]{3}\d+$/";
        $emailVal="/^\w+([\.\-]\w+)*@\w+(\-\w+)*(.\w{2,3})+$/";
        $phoneVal="/^\d{10}$/";
        
        if(!preg_match($nameVal, $this->name))
            $error="Username must only contain '_', '.' and alphanumeric characters!";
        else if(!preg_match($fnameVal,$this->fname))
            $error="Full Name must only contain alphabets!";
        else if(!preg_match($passwordVal,$this->password))
            $error="Password must contain atleast 6 characters!";
        else if($this->password != $this->confPassword)
            $error="Passwords do not match!";
        else if(!preg_match($emailVal,$this->email))
            $error="Invalid email entered! It must be in someone@domain.com form!";
        else if($this->email != $this->confEmail)
            $error="Email address does not match!";
        else if(!preg_match($deptVal,$this->dept))
            $error="Department Name is invalid!";
        else if(!preg_match($rnoVal,$this->rno))
            $error="Roll no. must be in form 2012CSA1138!";
        else if(!preg_match($phoneVal,$this->phone))
            $error="Phone number must be a combination of 10 digits!";
        else{
            if(register::checkExisting($db,'username',$this->name))
                $error="Oops! Somebody owns that username. Pick a different one.";
            else if(register::checkExisting($db,'email',$this->email))
                $error="This email is already registered with us! Please contact TSS E-Account Manager incase you forgot your password.";
            else if(register::checkExisting($db,'rno',$this->rno))
                $error="This Roll No. is already registered with us! Please contact TSS E-Account Manager incase you forgot your password.";
            else
                return true;
        }
        
        if(isset($error))
            $_SESSION['error']['regVal']=$error;
        return false;
    }
    
    static function checkExisting($db,$type,$value){
        if($db instanceof MySQLi){
            $type=$db->real_escape_string($type);
            $value=$db->real_escape_string($value);
            $result=$db->query("SELECT * FROM `users` WHERE `$type`='$value'");
            if(!$db->errno)
            {
                if($result->num_rows)
                    return true;
            }
            else{
                $_SESSION['error']['regVal']="Error code R1 : Internal Server error!";
                return false;
            }
            
            $result=$db->query("SELECT * FROM `conf_users` WHERE `$type`='$value'");
            if(!$db->errno)
            {
                if($result->num_rows)
                    return true;
                return false;
            }
            else{
                $_SESSION['error']['regVal']="Error code R2 : Internal Server error!";
                return false;
            }
        }
        else
            $_SESSION['error']['register']="Parameter 1 is invalid! It must be an MySQLi Object.";
            return false;
    }
}

?>