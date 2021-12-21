<?php
	include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_REQUEST["code"])){
			$code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
			$rs = mysqli_query($conn,"select * from album_category where code='$code'");
			if($r=mysqli_fetch_array($rs)){
				?>
					<label class="form-label">Update Category</label>
					<form>
						<input class="form-control"  type="text" id="category" value="<?php echo $r["category_name"]?>"/><br>
						<a ><input type="submit" value="update" id="<?php echo $code?>" class="btn btn-success"></a>
					</form>
				<?php
			}
		}
	}
?>