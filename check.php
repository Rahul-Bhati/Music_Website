<?php
	if(isset($_POST["email"]) && isset($_POST["pass"])){
		include("db.php");
		$email = mysqli_real_escape_string($conn,$_REQUEST["email"]);
		$pass = mysqli_real_escape_string($conn,$_REQUEST["pass"]);
		//echo $email." ".$pass;
		
		$rs = mysqli_query($conn,"select * from user where email='$email'");
		if($r = mysqli_fetch_array($rs)){
			if($r["pass"]==$pass){
				setcookie("user",$email,time()+3600);
				header("location:index.php");
			}
			else{
				header("location:register.php?pass_error=1");
			}
		}
		else{
			header("location:register.php?error=1");
		}
	}
	else{
		header("location:register.php?login_empty=1");
	}

?>