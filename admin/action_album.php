<?php
	include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_REQUEST["code"]) && isset($_REQUEST["text"])){
			$category_code = mysqli_real_escape_string($conn,$_GET["category_code"]);
			$code = mysqli_real_escape_string($conn,$_REQUEST["code"]);
			$text = mysqli_real_escape_string($conn,$_REQUEST["text"]);
			if($text=="edit"){
				//echo $text;
				?>
				<div class="container-fluid px-4">
					<h1 class="mt-4">Edit Album</h1>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item active">Edit Album</li>
					</ol><br><br>					
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="">
									<img class="img-fluid" src="<?php echo $category_code?>.jpg">
								</div>
							</div>
							<div class="col-sm-6">
							<?php
								$rs=mysqli_query($conn,"select * from album where code='$code'");
								if($r=mysqli_fetch_array($rs)){
							?>
									<form enctype="multipart/form-data" method="post" action="update_album.php?category_code=<?php echo $category_code?>&code=<?php echo $code?>">
										<label class="form-label">Album Name</label>
										<input class="form-control"  type="text" name="album_name" value="<?php echo $r["album_name"]?>" required /><br>
										<label class="form-label" >Description</label>
										<textarea class="form-control"  name="description" ><?php echo $r["description"]; ?></textarea><br>
										<label>Upload Image :</label></td>
										<input type="file" name="photo" class="form-control" ><br><br>
										<a><input type="submit" value="update album" class="btn btn-primary"></a><br><br>
									</form>
							</div>
						</div>
					</div>
				</div>
							<?php				
								}
			}	
			else if($text=="delete"){
				if(mysqli_query($conn,"update album set status='1' where code='$code'")>0){
					echo "<h3 class='alert alert-success'>Song Deleted !</h3>";	
					//echo "success";
					//header("location:song.php?code=$album_code");
				}	
			}
		}
	}	
?>