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
            $this->name=$name;
            $this->fname=$fname;
            $this->password=$password;
            $this->confPassword=$confPassword;
            $this->dept=$dept;
            $this->rno=$rno;
            $this->email=$email;
            $this->confEmail=$confEmail;
            $this->phone=$phone;
            $this->type=$type;
	}

	function createUser($db,$confirm=false){
        if($this->validate()){
            if($confirm && isset($_SESSION['user']) && (($this->type=="private" && $_SESSION['user']['rights'][1]>4) || ($this->type=="public" && $_SESSION['user']['rights'][1]>3))){
                $rights=$this->private?121111113:120001110;
                $db::query("INSERT INTO `users` (`username`,`password`,`private`,`dept`,`rights`,`phone`,`email`,`rights`,`moderator`,`toc`) VALUES ('{$this->user}','{$this->pass}','{$this->email}','$rights','{$_SESSION['user']}','CURRENT_TIMESTAMP')");
            }
            else if (!$confirm) {
                $moderator=isset($_SESSION['user'])?$_SESSION['user']['username']:"";
                $db::query("INSERT INTO `conf_users` (`username`,`password`,`private`,`dept`,`phone`,`email`,`moderator`,`toc`) VALUES ('{$this->user}','{$this->pass}','{$this->private}','{$this->dept}','{$this->phone}','{$this->email}','$moderator','CURRENT_TIMESTAMP')");
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
    
    private function validate(){
        $nameVal="/^\w+([\.\-]\w+)*$/";
        $fnameVal="/^[[:alpha:]]+( [[:alpha:]])*$/";
        $passwordVal="/^.{5}.+$/";
        $deptVal="/^\[(a-z)(A-Z)]{3}\[(a-z)(A-Z)]*$/";
        $rnoVal="/^\d{4}\a{3}\d+$/";
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
        else
            return true;
        
        if(isset($error))
            $_SESSION['error']['regVal']=$error;
        return false;
    }
}

?>