<?php
	include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		$album_code=mysqli_real_escape_string($conn,$_GET["code"]);
		if(empty($_POST["description"])|| empty($_POST["song_name"])){
			header("location:song.php?code=$album_code&empty=1");
		}
		else{
			$description=mysqli_real_escape_string($conn,$_POST["description"]);
			$song_name=mysqli_real_escape_string($conn,$_POST["song_name"]);
			
			$code="";
			
			$sn=0;
			$rs=mysqli_query($conn,"select MAX(sn) from song");
			if($r=mysqli_fetch_array($rs)){
				 $sn=$r[0];
			}
			$sn++;
			 $a=array();
			for($i='A'; $i<='Z'; $i++ ){
				array_push($a,$i);
				if($i='Z')
					break;
				}
			for($i='a'; $i<='z'; $i++ ){
				array_push($a,$i);
				if($i='z')
					break;
				}	
			for($i=0; $i<=9; $i++ ){
				array_push($a,$i);	
			}
			
			$b=array_rand($a,6);
			for($i=0; $i<sizeof($b); $i++ ){
				$code=$code.$a[$b[$i]];
			}	
			  
			$code=$code."_".$sn; 
			$target ="../album/".$album_code."/".$sn.".mp3" ;
					   
			if(move_uploaded_file($_FILES['mp3']['tmp_name'],$target)){
				if(mysqli_query($conn,"insert into song values($sn,'$code','$song_name','$description','$album_code','0')")>0){
					mkdir("../album/".$album_code."/".$code);
					header("location:song.php?code=$album_code&success=1");
				}
				else{
					header("location:song.php?code=$album_code&error=1") ;
				} 
			}
			else{
				header("location:song.php?code=$album_code&mp3_error=1") ;  
			} 
		}
	}
?>	