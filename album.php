<?php 
	if(!(isset($_REQUEST["category_code"]) && isset($_REQUEST["category_name"]))){
		header("location:index.php");
	}
	else{
		$category_code = $_REQUEST["category_code"];
		$category_name = $_REQUEST["category_name"];
?>
<html>
	<head>
		<title></title>
		<style>
			
			.container{
				position: absolute;
				left: 10%;
				top: 15%;
				transform: translate(-20%, -20%);
				width: 500px;
				height: 50px;
				border-bottom: 5px solid #000;
				line-height: 50px;
				overflow: hidden;
			}
			.container span{
				color: #fff;
				font-size: 30px;
				background: #000;
				display: inline-block;
				padding: 2px 20px;
				text-transform: uppercase;
			}
			
			
		</style>
	</head>
	<body>
			<div class="row">
				<div class="container"><span><?php echo $category_name?></span></div>
			</div>
			<br><br>
			<div class="row" style="margin-top:100px;margin-left:10px;">
					<br><br><br>
					<?php
						include("db.php");
						$rs=mysqli_query($conn,"select * from album where category_code='$category_code' ");
						while($r = mysqli_fetch_array($rs)){
						?>
						
							<div class="w3-card-4" style="width:15rem;cursor:pointer;">
								<table class="table table-borderless">
									<tr><td><img src="album/<?php echo $r["code"]; ?>.jpg" style="width:222px;height:200px;" class="img-fluid"/></td></tr>
									<tr><td><h4><center><strong class="card-title" id="<?php echo $r["code"]; ?>" rel="<?php echo $r["album_name"]; ?>"><?php echo $r["album_name"]; ?></strong><i style="float:right;" class='bx bxs-heart' ></i></center></h4></td></tr>
								</table>
							</div>
						    &nbsp;
						    &nbsp;
						<?php
						}
					?>
					<br><br>
			</div>
			<br><br><br>
			
	</body>
</html>
<?php
	}
?>