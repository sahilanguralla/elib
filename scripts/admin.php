<?php

	require_once 'authentication.class.php';
	require_once 'database.class.php';
	require_once 'encrypt.class.php';
	
	$db_connect = new db_connect('localhost','rks','','library');
	$db_connect->db_connect();
	$authenticate = new authenticate();

	if($authenticate->front_end_validation("name", "password")){
		
		$authenticate->db_xconfirm($db_connect);
	}

?>

<form action="admin.php" method="POST">
	<hr/>
	Username:<br>
	<input type="text" name="name" value=""><br>
	Password:<br>
	<input type="password" name="password" value="">
	<input type="submit" value="Submit">
</form>