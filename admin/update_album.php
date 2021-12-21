<?php
	include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_GET["code"]) && isset($_GET["category_code"])){
			$category_code = mysqli_real_escape_string($conn,$_GET["category_code"]);
			$code = mysqli_real_escape_string($conn,$_GET["code"]);
			//echo $album_code." ".$code;
			if(empty($_POST["description"])|| empty($_POST["album_name"])){
				header("location:album.php?code=$category_code&empty=1");
			}
			else{
				$description=mysqli_real_escape_string($conn,$_POST["description"]);
				$album_name=mysqli_real_escape_string($conn,$_POST["album_name"]);
				//echo $album_name." ".$description;
				$rs = mysqli_query($conn,"select * from album where code='$code'");
				if($r=mysqli_fetch_array($rs)){
					$sn = $r["sn"];
					$target ="../album/".$code.".jpg" ;   
					if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)){
						if(mysqli_query($conn,"update album set sn=$sn,album_name='$album_name',description='$description',status='0' where code='$code'")>0){
							mkdir("../album/".$code);
							header("location:album.php?code=$category_code&usuccess=1");
						}
						else{
							header("location:album.php?code=$category_code&uerror=1") ;
						} 
					}
					else{
						header("location:album.php?code=$category_code&ump3_error=1") ;  
					} 
				}
			}
		}
	}
			
?>