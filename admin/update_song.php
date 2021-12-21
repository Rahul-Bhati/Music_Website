<?php
	include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_GET["code"]) && isset($_GET["album_code"])){
			$album_code = mysqli_real_escape_string($conn,$_GET["album_code"]);
			$code = mysqli_real_escape_string($conn,$_GET["code"]);
			//echo $album_code." ".$code;
			if(empty($_POST["description"])|| empty($_POST["song_name"])){
				header("location:song.php?code=$album_code&empty=1");
			}
			else{
				$description=mysqli_real_escape_string($conn,$_POST["description"]);
				$song_name=mysqli_real_escape_string($conn,$_POST["song_name"]);
				//echo $song_name." ".$description;
				$rs = mysqli_query($conn,"select * from song where code='$code'");
				if($r=mysqli_fetch_array($rs)){
					$sn = $r["sn"];
					$target ="../album/".$album_code."/".$sn.".mp3" ;   
					if(move_uploaded_file($_FILES['mp3']['tmp_name'],$target)){
						if(mysqli_query($conn,"update song set sn=$sn,song_name='$song_name',description='$description',status='0' where code='$code'")>0){
							mkdir("../album/".$album_code."/".$code);
							header("location:song.php?code=$album_code&usuccess=1");
						}
						else{
							header("location:song.php?code=$album_code&uerror=1") ;
						} 
					}
					else{
						header("location:song.php?code=$album_code&ump3_error=1") ;  
					} 
				}
			}
		}
	}
			
?>