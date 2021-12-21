<?php
	include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		$category_code=mysqli_real_escape_string($conn,$_GET["code"]);
		if(empty($_POST["description"])|| empty($_POST["album_name"])){
			header("location:album.php?code=$category_code&empty=1");
		}
		else{
			$description=mysqli_real_escape_string($conn,$_POST["description"]);
			$album_name=mysqli_real_escape_string($conn,$_POST["album_name"]);
			
			$code="";
			
			$sn=0;
			$rs=mysqli_query($conn,"select MAX(sn) from album");
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
			$target ="../album/".$code.".jpg" ;
					   
			if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)){
				if(mysqli_query($conn,"insert into album values($sn,'$code','$album_name','$description','$category_code','0')")>0){
					mkdir("../album/".$code);
					header("location:album.php?code=$category_code&success=1");
				}
				else{
					header("location:album.php?code=$category_code&error=1") ;
				} 
			}
			else{
				header("location:album.php?code=$category_code&img_error=1") ;  
			} 
		}
	}
?>	