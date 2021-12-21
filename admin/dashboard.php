<?php 
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		$email = $_COOKIE["login"] ;
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
			/* jquery -> albumjc.php and addalbum.php
			$(document).ready(function(){
				$(".btn.btn-primary").click(function(){
					var id = $(this).attr("id");
					$.post(
						"albumjc.php",{code:id},function(data){
							$("#record").html(data);
						}
					);
				});
			});
			$(document).on("click",".btn.btn-success",function(data){
				var id = $(this).attr("id");
				var aname = $("#aname").val();
				var des = $("#des").val();
				var file = $("#file").val();
				$.post(
					"addalbum.php",{code:id,aname:aname,des:des,photo:file},function(data){
						//$("#record").html(data);
						alert(data);
					}
				);
			});
			*/
			$(document).ready(function(){
				$(".fa.fa-edit").click(function(){
					var code = $(this).attr("id");
					//alert(code);
					$.post(
						"edit_category.php",{code:code},function(data){
							//alert(data);
							$("#cat").html(data);
						}
					);
				}); 
			});
			$(document).on("click",".btn.btn-success",function(data){
				var code = $(this).attr("id");
				var val = $("#category").val();
				//alert(code+" "+val);
				$.post(
					"update_category.php",{code:code,val:val},function(data){
						if(data=="success"){
							//alert(data);
							//$("#cat").html(data);
							$("#cat").html("<h3 class='alert alert-success'>Category Updated !</h3>");
						}
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
                        <?php echo $email; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main id="record">
					<span id="store" prel="" pid="" prec="0"></span>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol><br><br>
						<div class="col-sm-12">
							<div class="card text-white bg-primary mb-3">
								<div class="card-header">Category</div>
								<div class="card-body">
									<?php
										if(isset($_GET["success"])){
										?>
											<h3 class="alert alert-success">Category Added !</h3>
										<?php
										}
										else if(isset($_GET["empty"])){
										?>
											<h3 class="alert alert-warning">Field Required !</h3>
										<?php
										}
										else if(isset($_GET["error"])){
										?>
											<h3 class="alert alert-danger">Category Not Added !</h3>
										<?php
										}
										else if(isset($_GET["err"])){
										?>
											<h3 class="alert alert-danger"> Error !</h3>
										<?php
										}
										else if(isset($_GET["exist"])){
										?>
											<h3 class="alert alert-danger">Category Alredy Exist !</h3>
										<?php
										}
									?>
									<div id="cat">	
										<label class="form-label">Add Category</label>
										<form method="post" action="add_category.php"  >
											<input class="form-control"  type="text" name="category" placeholder="category name" /><br>
											<a ><input type="submit" value="add" class="btn btn-success"></a>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" >
                        <div class="col-sm-12">
							<div class="container-fluid px-4">
									<h2 style="font-family:serif">All Category</h2>
								<?php
									
									$rs=mysqli_query($conn,"select * from album_category where status='0'");
										while($r=mysqli_fetch_array($rs)){
									?>
											<table class="table table-borderless">
												<tr>
													<td style="width:400px" ><?php echo $r["category_name"]; ?></td>
													<td><a href="album.php?code=<?php echo $r['code']; ?>"><button class="btn btn-primary">Add Album</button></a></td>
													<td><i class="fa fa-edit" style="color:blue;cursor:pointer" id="<?php echo $r['code']; ?>"></i></td>
													<td><i class="fa fa-trash" style="color:red;cursor:pointer"></i></td>
												</tr>
											</table>
											
									<?php
										}
									?>
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