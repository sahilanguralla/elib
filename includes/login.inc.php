<?php

if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['rem'])){
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $rem=$_POST['rem'];
    require_once "class/login.class.php";
    require_once "class/hash.class.php";
    $mysqli=new mysqli("localhost","tss_server","magnanimous","tss_server");
    if($mysqli->connect_errno){
        die("Error Code L0 : Internal Server error!");
    }
    $usr=new login($user,$pass,$rem);
    if($usr->validate())
        if($usr->verify($mysqli))
            echo "true";
        else
            echo $_SESSION['error']['login'];
    else
        echo $_SESSION['error']['loginVal'];
}
else
    echo "Incomplete information received!";