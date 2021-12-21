<?php
	include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(!isset($_REQUEST["id"])){
			header("location:album.php");
		}
		else{
			$flag = 0;
			$category_code=mysqli_real_escape_string($conn,$_GET["code"]);
			$id = mysqli_real_escape_string($conn,$_REQUEST["id"]);
			$rs=mysqli_query($conn,"select * from album where category_code='$category_code' AND status='0' AND album_name LIKE '$id%'");
			while($r=mysqli_fetch_array($rs)){
				$flag=1;
		?>			
				<table class="table table-borderless">
					<tr>
					<td style="width:200px"><?php echo $r[2]; ?></td>
					<td><a href="song.php?code=<?php echo $r['code']; ?>"><button class="btn btn-primary">Add Song</button></a></td>
					<td><i class="fa fa-edit" id="<?php echo $r['code']; ?>" rel="edit" style="color:blue;cursor:pointer"></i></td>
					<td><i class="fa fa-trash" rel="<?php echo $r['code']; ?>" id="delete" style="color:red;cursor:pointer"></i></td>
					</tr>
				</table>							
		<?php
			}
			if($flag==0){
				echo "<h3 style='color:red'><b>Record not found !</b></h3>";
			}	
		}
	}
?>