<?php

	if(!isset($_COOKIE["user"])){
		header("location:index.php?reg=1");
	}
	else{
		include("db.php");
		$email=mysqli_real_escape_string($conn,$_COOKIE["user"]);
		if(!isset($_REQUEST["code"]){
			header("location:index.php?code=1");
		}
		else{
			$code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
			//mysqli_query($conn,"insert into favourite values('$code','$email')");
			echo $email." ".$code;
		}
	}

?>