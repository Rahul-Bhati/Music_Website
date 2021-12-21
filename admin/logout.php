<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		$email = $_COOKIE["login"];
		setcookie("login",$email,time()-1);
		header("location:index.php");
	}
	
?>