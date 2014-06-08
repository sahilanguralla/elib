<?php

if(isset($_POST['fname']) && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['confPass']) && isset($_POST['phone']) && isset($_POST['dept']) && isset($_POST['email']) && isset($_POST['confEmail']) && isset($_POST['rno']) && isset($_POST['captcha']) && isset($_POST['terms'])){
    session_start();
    include 'class/register.class.php';
    include 'class/captcha.class.php';
    $captcha=strtolower($_POST['captcha']);
    if(!captcha::verifyCaptcha("register",$captcha))
        die("Captcha doesn't match the one that is given in picture!");
    $terms=$_POST['terms'];
    if($terms=="false")
        die("You didn't agree to our terms and conditions!");
    $type=false;
    $fname=$_POST['fname'];
    $name=$_POST['user'];
    $password=$_POST['pass'];
    $confPassword=$_POST['confPass'];
    $dept=$_POST['dept'];
    $rno=$_POST['rno'];
    $email=$_POST['email'];
    $confEmail=$_POST['confEmail'];
    $phone=$_POST['phone'];
    $mysqli=new mysqli("localhost","tssgndu_lib","tsslibrary","tssgndu_lib");
    $user=new register($type, $name, $fname, $password, $confPassword, $dept, $rno, $email, $confEmail, $phone);
    if($user->createUser($mysqli))
        echo "true";
    else{
        if(isset($_SESSION['error']['regVal']))
            echo $_SESSION['error']['regVal'];
        else if(isset($_SESSION['error']['register']))
            echo $_SESSION['error']['register'];
        else
            echo "Unknown error occured!";
    }
}
else {
    echo "Please fill in all the fields!";
}

