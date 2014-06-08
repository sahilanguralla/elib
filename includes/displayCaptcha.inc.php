<?php

session_start();
include 'class/captcha.class.php';
if(isset($_GET['type']))
    $captcha=new captcha($_GET['type']);
else
    $captcha=new captcha("register");
$captcha->generateImage();