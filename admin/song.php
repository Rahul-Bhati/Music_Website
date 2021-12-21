<?php 
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		$email = $_COOKIE["login"] ;
		$album_code = $_GET["code"] ;
		include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>My Music</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="https://use.fontawesome.com/09901d9403.js"></script>
		<script>
			$(document).ready(function(){
				$(".btn.btn-danger").click(function(){
					var id = $(this).text();
					$.post(
						"match_song.php?code=<?php echo $album_code; ?>",{id:id},function(data){
							$("#matches").html(data);
						}
					);
				});
				
				$(".fa.fa-edit").click(function(){
					var code = $(this).attr("id");
					var text = $(this).attr("rel");
					//alert(code+" "+text);
					$.post(
						"action_song.php?album_code=<?php echo $album_code; ?>",{code:code,text:text},function(data){
							//alert(data);
							$("#record").html(data);
						}
					);
				}); 
				
				$(".fa.fa-trash").click(function(){
					var text = $(this).attr("id");
					var code = $(this).attr("rel");
					//alert(code+" "+text);
					$.post(
						"action_song.php?album_code=<?php echo $album_code; ?>",{code:code,text:text},function(data){
							//alert(data);
							$("#action").html(data);
						}
					);
				}); 
			});
			
			$(document).on("click",".fa.fa-edit",function(data){
				var code = $(this).attr("id");
				var text = $(this).attr("rel");
				//alert(code+" "+text);
				$.post(
					"action_song.php?album_code=<?php echo $album_code; ?>",{code:code,text:text},function(data){
						//alert(data);
						$("#record").html(data);
					}
				);
			}); 
			$(document).on("click",".fa.fa-trash",function(data){
				var text = $(this).attr("id");
				var code = $(this).attr("rel");
				//alert(code+" "+text);
				$.post(
					"action_song.php?album_code=<?php echo $album_code; ?>",{code:code,text:text},function(data){
						//alert(data);
						$("#action").html(data);
					}
				);
			}); 
			
		</script>
   </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.php">My Music</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fa fa-bars"></i></button>
            <!-- Navbar Search-->
            <!--<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fa fa-search"></i></button>
                </div>
            </form>
             <!-- Navbar
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul> -->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="album.php">Album</a>
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </nav> 
                            </div> -->
							
                            <a class="nav-link" href="logout.php">Logout &nbsp;&nbsp; <i class="fa fa-sign-out"></i></a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php
							echo $email;
						?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main id="record">
				<div id="action"></div>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Song</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Song</li>
                        </ol><br><br>
						
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-6">
									<div class="">
										<img class="img-fluid" src="../album/<?php echo $album_code ?>.jpg">
									</div>
								</div>
								<div class="col-sm-6">
									<?php
										if(isset($_GET["success"])){
										?>
											<h3 class="alert alert-success">Song Added !</h3>
										<?php
										}
										else if(isset($_GET["empty"])){
										?>
											<h3 class="alert alert-warning">Field Required !</h3>
										<?php
										}
										else if(isset($_GET["error"])){
										?>
											<h3 class="alert alert-danger">Song Not Added !</h3>
										<?php
										}
										else if(isset($_GET["mp3_error"])){
										?>
											<h3 class="alert alert-danger">Song Error !</h3>
										<?php
										}
										else if(isset($_GET["usuccess"])){
										?>
											<h3 class="alert alert-danger">Song Updated Successfully !</h3>
										<?php
										}
										else if(isset($_GET["uerror"])){
										?>
											<h3 class="alert alert-danger">Song Not Updated !</h3>
										<?php
										}
										else if(isset($_GET["ump3_error"])){
										?>
											<h3 class="alert alert-danger">Song Update Error !</h3>
										<?php
										}
									?>
											
									<form enctype="multipart/form-data" method="post" action="add_song.php?code=<?php echo $album_code ?>">
										<label class="form-label">Song Name</label>
										<input class="form-control"  type="text" name="song_name" placeholder="album name" required /><br>
										<label class="form-label" >Description</label>
										<textarea class="form-control"  name="description" placeholder="description"></textarea><br>
										<label>Upload Song :</label></td>
										<input type="file" name="mp3" class="form-control" ><br><br>
										<a><input type="submit" value="add song" class="btn btn-primary"></a><br><br>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row" >
                        <div class="col-sm-12">
							<div class="container-fluid px-4">
							<br><br>
									<h2 style="font-family:serif">All Album</h2>
									<br>
									&nbsp;&nbsp;&nbsp;
								<?php
									for($i='A' ; $i<='Z' ; $i++){
										echo "<button class='btn btn-danger' >".$i."</button>&nbsp;&nbsp;";
										if($i=='Z')
											break;
									}
									echo "<br><br>";
								?>
									<div class="col-sm-12" id="matches">
									<?php
										$rs=mysqli_query($conn,"select * from song where album_code='$album_code' AND status='0' AND song_name LIKE 'A%'");
										while($r=mysqli_fetch_array($rs)){
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
									?>
									</div>
								</div>
							</div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="js/scripts.js"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php
	}
?>