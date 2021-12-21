<?php
	include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(!isset($_REQUEST["id"])){
			header("location:song.php");
		}
		else{
			$flag = 0;
			$album_code=mysqli_real_escape_string($conn,$_GET["code"]);
			$id = mysqli_real_escape_string($conn,$_REQUEST["id"]);
			$rs=mysqli_query($conn,"select * from song where album_code='$album_code' AND status='0' AND song_name LIKE '$id%'");
			while($r=mysqli_fetch_array($rs)){
				$flag = 1;
		?>			
				<table class="table table-borderless">
					<tr>
						<td style="width:200px"><?php echo $r["song_name"]; ?></td>
						<td><i class="fa fa-edit"  id="<?php echo $r['code']; ?>" rel="edit" style="color:blue;cursor:pointer" ></i></td>
						<td><i class="fa fa-trash" rel="<?php echo $r['code']; ?>" id="delete"  style="color:red;cursor:pointer"></i></td>
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