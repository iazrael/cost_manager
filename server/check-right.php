<?php
	session_start();
	$login = $_SESSION['logininfo'];
    $user = $_SESSION['loginuser'];
	if(isset($user) && isset($login) && $login='3.141592654'){
		
	}else{
		header("HTTP/1.1 303 To Index");
        header("Location: ./login.php");
	}
?>