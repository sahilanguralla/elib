<?php

if(isset($_POST['fname']) && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['confPass']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['dept']) && isset($_POST['email']) && isset($_POST['confEmail']) && isset($_POST['rno'])){
    session_start();
    include 'class/register.class.php';
    $type="public";
    $fname=$_POST['fname'];
    $name=$_POST['user'];
    $password=$_POST['pass'];
    $confPassword=$_POST['confPass'];
    $dept=$_POST['dept'];
    $rno=$_POST['rno'];
    $email=$_POST['email'];
    $confEmail=$_POST['confEmail'];
    $phone=(int)$_POST['phone'];
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

