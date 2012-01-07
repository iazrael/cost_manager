<?php
	session_start();
	$login = $_SESSION['logininfo'];
    $user = $_SESSION['loginuser'];
	if(isset($user) && isset($login) && $login='3.141592654'){
		
	}else{
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found"); 
        echo "404 Not Found";
        exit();
	}
?>