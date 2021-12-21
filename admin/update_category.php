<?php
	include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_REQUEST["code"]) && isset($_REQUEST["val"])){
			$code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
			$val=mysqli_real_escape_string($conn,$_REQUEST["val"]);
			if(mysqli_query($conn,"update album_category set category_name='$val' where code='$code'")>0){
				echo "success";
			}
		}
	}
?>