<?php
include("db.php");
	if(empty($_POST["email"]) || empty($_POST["pass"])){
		header("location:index.php?empty=1");
	}
	else{
		$email=mysqli_real_escape_string($conn,$_POST["email"]);
		$password=mysqli_real_escape_string($conn,$_POST["pass"]);
		
		$rs=mysqli_query($conn,"select * from admin where email='$email'" );
		if($r=mysqli_fetch_array($rs)){
			if($r["pass"]==$password){
				setcookie("login",$email,time()+3600);
				header("location:dashboard.php");
			}
			else{
				header("location:index.php?pass_error=1");
			}
		}
		else{
			header("location:index.php?email_error=1");
		}
	}

?>


