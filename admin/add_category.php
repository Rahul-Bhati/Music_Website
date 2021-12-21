<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_POST["category"])){
			if(!empty($_POST["category"])){
				$category=mysqli_real_escape_string($conn,$_POST["category"]);
				$code='';
				$sn=0;
				$rs=mysqli_query($conn,"select MAX(sn) from album_category");
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
					
					if((mysqli_fetch_array(mysqli_query($conn,"select * from album_category where category_name='$category'")))>0){
						header("location:dashboard.php?exist=1");
					}
					else{
							if(mysqli_query($conn,"insert into album_category values($sn,'$code','$category','0')")>0){
								header("location:dashboard.php?success=1");
							}
							else{
								header("location:dashboard.php?error=1");
							}
					}	
				
			}
			else{
				header("location:dashboard.php?empty=1");
			}
		}
		else{
			header("location:dashboard.php?err=1");
		}
	}
	
?>	