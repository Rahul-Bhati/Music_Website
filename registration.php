<?php
	if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["gender"]) && isset($_POST["dob"]) 
	&& isset($_POST["phone"])){
		include("db.php");
		$sn = 0;
		$code = "";
		$name = mysqli_real_escape_string($conn,$_POST["username"]);
		$email = mysqli_real_escape_string($conn,$_POST["email"]);
		$pass = mysqli_real_escape_string($conn,$_POST["pass"]);
		$gender = mysqli_real_escape_string($conn,$_POST["gender"]);
		$dob = mysqli_real_escape_string($conn,$_POST["dob"]);
		$phone = mysqli_real_escape_string($conn,$_POST["phone"]);
		
		$rs=mysqli_query($conn,"select MAX(sn) from user");
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
		
		$target = "profile/".$code.".jpg";
		
		//echo $name." ".$email." ".$pass." ".$gender." ".$dob." ".$phone." ".$photo." ".$target." ".$code;
	
		if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)){ 
			if(mysqli_query($conn,"insert into user values($sn,'$code','$name','$email','$pass','$phone','$dob','$gender')")>0){
				header("location:register.php?success=1");
			}
			else{
				header("location:register.php?again=1");
			} 	
		}
		else{ 
			header("location:register.php?img_error=1");
		} 
	}
    else{
		header("location:register.php?empty=1");
	} 

?>