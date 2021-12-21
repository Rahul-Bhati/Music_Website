<?php 
	if(!(isset($_REQUEST["album_code"]) && isset($_REQUEST["album_name"]))){
		header("location:index.php");
	}
	else{
		$album_code = $_REQUEST["album_code"];
		$album_name = $_REQUEST["album_name"];
?>
<html>
	<head>
		<title></title>
		<style>
			
			.container{
				position: absolute;
				transform: translate(-0%, -0%);
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
				
			</div>
			<br><br>
			<div class="row">
				<div class="col-sm-6">
					<img src="album/<?php echo $album_code?>.jpg" class="img-fluid">
				</div>	
				<div class="col-sm-4">
					<div class="container"><span><?php echo $album_name?></span></div><br><br>
					<div class="song"style="margin-top:10px;">
					<?php
						include("db.php");
						$rs=mysqli_query($conn,"select * from song where album_code='$album_code' ");
						while($r = mysqli_fetch_array($rs)){
						?>			
							<table class="table table-borderless">
								<tr><td style="width:50px;"><h4 class="card-title" style="font-size:20px;"><?php echo $r["song_name"]; ?></h4></td>
									<td style="float:right;"><audio controls="controls" ><source src="album/<?php echo $r["album_code"]?>/<?php echo $r["sn"];?>.mp3" type="audio/mp3"></audio></td>
								</tr>
							</table>
						    &nbsp;
						    &nbsp;
						<?php
						}
					?>
					</div>
				</div>
					<br><br>
			</div>
			<br><br><br>
			
	</body>
</html>
<?php
	}
?>