<?php
	session_start();
if(isset($_SESSION["user"]) || isset($_COOKIE['user_log_in'])){	
	}
	else{
	header("Location: index.php");
		}
?>