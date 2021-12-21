<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
		<style>
			/* Google Fonts Import Link */
			@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
			*{
			  margin: 0;
			  padding: 0;
			  box-sizing: border-box;
			  font-family: 'Poppins', sans-serif;
			}
			.sidebar{
			  position: fixed;
			  top: 0;
			  left: 0;
			  height: 100%;
			  width: 230px;
			  background: #11101d;
			  z-index: 100;
			  transition: all 0.5s ease;
			}
			.sidebar.close{
			  width: 78px;
			}
			.sidebar .logo-details{
			  height: 60px;
			  width: 100%;
			  display: flex;
			  align-items: center;
			}
			.sidebar .logo-details i{
			  font-size: 30px;
			  color: #fff;
			  height: 50px;
			  min-width: 78px;
			  text-align: center;
			  line-height: 50px;
			}
			.sidebar .logo-details .logo_name{
			  font-size: 22px;
			  color: #fff;
			  font-weight: 600;
			  transition: 0.3s ease;
			  transition-delay: 0.1s;
			}
			.sidebar.close .logo-details .logo_name{
			  transition-delay: 0s;
			  opacity: 0;
			  pointer-events: none;
			}
			.sidebar .nav-links{
			  height: 100%;
			  padding: 30px 0 150px 0;
			  overflow: auto;
			}
			.sidebar.close .nav-links{
			  overflow: visible;
			}
			.sidebar .nav-links::-webkit-scrollbar{
			  display: none;
			}
			.sidebar .nav-links li{
			  position: relative;
			  list-style: none;
			  transition: all 0.4s ease;
			}
			.sidebar .nav-links li:hover{
			  background: #1d1b31;
			}
			.sidebar .nav-links li .iocn-link{
			  display: flex;
			  align-items: center;
			  justify-content: space-between;
			}
			.sidebar.close .nav-links li .iocn-link{
			  display: block
			}
			.sidebar .nav-links li i{
			  height: 50px;
			  min-width: 78px;
			  text-align: center;
			  line-height: 50px;
			  color: #fff;
			  font-size: 20px;
			  cursor: pointer;
			  transition: all 0.3s ease;
			}
			.sidebar .nav-links li.showMenu i.arrow{
			  transform: rotate(-180deg);
			}
			.sidebar.close .nav-links i.arrow{
			  display: none;
			}
			.sidebar .nav-links li a{
			  display: flex;
			  align-items: center;
			  text-decoration: none;
			}
			.sidebar .nav-links li a .link_name{
			  font-size: 18px;
			  font-weight: 400;
			  color: #fff;
			  transition: all 0.4s ease;
			}
			.sidebar.close .nav-links li a .link_name{
			  opacity: 0;
			  pointer-events: none;
			}
			.sidebar .nav-links li .sub-menu{
			  padding: 6px 6px 14px 80px;
			  margin-top: -10px;
			  background: #1d1b31;
			  display: none;
			}
			.sidebar .nav-links li.showMenu .sub-menu{
			  display: block;
			}
			.sidebar .nav-links li .sub-menu a{
			  color: #fff;
			  font-size: 15px;
			  padding: 5px 0;
			  white-space: nowrap;
			  opacity: 0.6;
			  transition: all 0.3s ease;
			}
			.sidebar .nav-links li .sub-menu a:hover{
			  opacity: 1;
			}
			.sidebar.close .nav-links li .sub-menu{
			  position: absolute;
			  left: 100%;
			  top: -10px;
			  margin-top: 0;
			  padding: 10px 20px;
			  border-radius: 0 6px 6px 0;
			  opacity: 0;
			  display: block;
			  pointer-events: none;
			  transition: 0s;
			}
			.sidebar.close .nav-links li:hover .sub-menu{
			  top: 0;
			  opacity: 1;
			  pointer-events: auto;
			  transition: all 0.4s ease;
			}
			.sidebar .nav-links li .sub-menu .link_name{
			  display: none;
			}
			.sidebar.close .nav-links li .sub-menu .link_name{
			  font-size: 18px;
			  opacity: 1;
			  display: block;
			}
			.sidebar .nav-links li .sub-menu.blank{
			  opacity: 1;
			  pointer-events: auto;
			  padding: 3px 20px 6px 16px;
			  opacity: 0;
			  pointer-events: none;
			}
			.sidebar .nav-links li:hover .sub-menu.blank{
			  top: 50%;
			  transform: translateY(-50%);
			}
			.sidebar .profile-details{
			  position: fixed;
			  bottom: 0;
			  width: 230px;
			  display: flex;
			  align-items: center;
			  justify-content: space-between;
			  background: #1d1b31;
			  padding: 12px 0;
			  transition: all 0.5s ease;
			}
			.sidebar.close .profile-details{
			  background: none;
			}
			.sidebar.close .profile-details{
			  width: 78px;
			}
			.sidebar .profile-details .profile-content{
			  display: flex;
			  align-items: center;
			}
			.sidebar .profile-details img{
			  height: 52px;
			  width: 52px;
			  object-fit: cover;
			  border-radius: 16px;
			  margin: 0 14px 0 12px;
			  background: #1d1b31;
			  transition: all 0.5s ease;
			}
			.sidebar.close .profile-details img{
			  padding: 10px;
			}
			.sidebar .profile-details .profile_name,
			.sidebar .profile-details .job{
			  color: #fff;
			  font-size: 15px;
			  font-weight: 500;
			  white-space: nowrap;
			}
			.sidebar.close .profile-details i,
			.sidebar.close .profile-details .profile_name,
			.sidebar.close .profile-details .job{
			  display: none;
			}
			.sidebar .profile-details .job{
			  font-size: 12px;
			}
			.home-section{
			  position: relative;
			  background: #E4E9F7;
			  height: 100%;
			  left: 230px;
			  width: calc(100% - 230px);
			  transition: all 0.5s ease;
			}
			.sidebar.close ~ .home-section{
			  left: 78px;
			  width: calc(100% - 78px);
			}
			.home-section .home-content{
			  height: 60px;
			  display: flex;
			  align-items: center;
			}
			.home-section .home-content .bx-menu,
			.home-section .home-content .text{
			  color: #11101d;
			  font-size: 35px;
			}
			.home-section .home-content .bx-menu{
			  margin: 0 15px;
			  cursor: pointer;
			}
			.home-section .home-content .text{
			  font-size: 26px;
			  font-weight: 600;
			}
			@media (max-width: 420px) {
			  .sidebar.close .nav-links li .sub-menu{
				display: none;
			  }
			}
			<!-- divider style css -->
			.wrapper
			{
			  padding-bottom: 90px;
			}

			.divider
			{
			  position: relative;
			  margin-top: 90px;
			  height: 1px;
			}

			.div-transparent:before
			{
			  content: "";
			  position: absolute;
			  top: 0;
			  left: 5%;
			  right: 5%;
			  width: 90%;
			  height: 1px;
			  background-image: linear-gradient(to right, transparent, rgb(48,49,51), transparent);
			}

			.div-dot:after
			{
			  content: "";
			  position: absolute;
			  z-index: 1;
			  top: -9px;
			  left: calc(50% - 9px);
			  width: 18px;
			  height: 18px;
			  background-color: goldenrod;
			  border: 1px solid rgb(48,49,51);
			  border-radius: 50%;
			  box-shadow: inset 0 0 0 2px white,
					  0 0 0 4px white;
			}
		</style>
		<script>
			$(document).ready(function(){
				$(".btn.btn-link").click(function(){
					var id = $(this).attr("id");
					var rel = $(this).attr("rel");
					//alert(id+" "+rel);
					$.post(
						"album.php",{category_code:id,category_name:rel},function(data){
							$("#record").html(data);
						}
					);
				});
				$(".category").click(function(){
					var id = $(this).attr("id");
					var rel = $(this).attr("rel");
					//alert(id+" "+rel);
					$.post(
						"album.php",{category_code:id,category_name:rel},function(data){
							$("#record").html(data);
						}
					);
				});
				$(".card-title").click(function(){
					var id = $(this).attr("id");
					var rel = $(this).attr("rel");
					//alert(id+" "+rel);
					$.post(
						"song.php",{album_code:id,album_name:rel},function(data){
							$("#record").html(data);
						}
					);
				});
				$(".bx.bxs-heart").click(function(){
					var rel = $(this).attr("rel");
					//alert(rel);
					$.post(
						"fav.php",{code:rel},function(data){
							$("#f"+rel).css("color","red");
						}
					);
				});
			});
			$(document).on("click",".card-title",function(){
				var id = $(this).attr("id");
					var rel = $(this).attr("rel");
					//alert(id+" "+rel);
					$.post(
						"song.php",{album_code:id,album_name:rel},function(data){
							$("#record").html(data);
						}
					);
			});
		</script>
	</head>
<body>
	<div class="sidebar close">
		<div class="logo-details">
			<i class='bx bxl-medium-old'></i>
			<span class="logo_name">My Music</span>
		</div>
		<ul class="nav-links">
			<li>
				<a href="index.php">
					<i class='bx bx-grid-alt' ></i>
					<span class="link_name">Dashboard</span>
				</a>
				<ul class="sub-menu blank">
				  <li><a class="link_name" href="index.php">Dashboard</a></li>
				</ul>
			</li>
			<li>
				<div class="iocn-link">
					<a href="#">
						<i class='bx bx-collection' ></i>
						<span class="link_name">Category</span>
					</a>
					<i class='bx bxs-chevron-down arrow' ></i>
				</div>
				<ul class="sub-menu">
					<li><a class="link_name" href="#">Category</a></li>
				<?php
					include("db.php");
					$rs = mysqli_query($conn,"select * from album_category");
					while($r=mysqli_fetch_array($rs)){
				?>
						<li><a class="category" style="cursor:pointer;" id="<?php echo $r[1]?>" rel="<?php echo $r[2]?>"><?php echo $r["category_name"]?></a></li>
				<?php
					}
				?>
				</ul>
			</li>
			<li>
				<div class="iocn-link">
					<a href="#">
						<i class='bx bx-book-alt' ></i>
						<span class="link_name">Posts</span>
					</a>
					<i class='bx bxs-chevron-down arrow' ></i>
				</div>
				<ul class="sub-menu">
					<li><a class="link_name" href="#">Posts</a></li>
					<li><a href="#">Web Design</a></li>
					<li><a href="#">Login Form</a></li>
					<li><a href="#">Card Design</a></li>
				</ul>
			</li>
			<li>
				<a href="favourite.php">
					<i class='bx bxs-heart'></i>
					<span class="link_name">Favourite</span>
				</a>
				<ul class="sub-menu blank">
					<li><a class="link_name" href="#">Favourite</a></li>
				</ul>
			</li>
			<li>
				<a href="register.php">
					<i class='bx bx-log-in-circle' ></i>
					<span class="link_name">Sign-up</span>
				</a>
				<ul class="sub-menu blank">
					<li><a class="link_name" href="register.php">Sign-up</a></li>
				</ul>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-playlist'></i>
					<span class="link_name">Playlist</span>
				</a>
				<ul class="sub-menu blank">
					<li><a class="link_name" href="#">Playlist</a></li>
				</ul>
			</li>
			<li>
				<a href="#">
					<i class='bx bx-history'></i>
					<span class="link_name">History</span>
				</a>
				<ul class="sub-menu blank">
					<li><a class="link_name" href="#">History</a></li>
				</ul>
			</li>
			<li>
				<a href="#">
					<i class='bx bx-cog' ></i>
					<span class="link_name">Setting</span>
				</a>
				<ul class="sub-menu blank">
					<li><a class="link_name" href="#">Setting</a></li>
				</ul>
			</li>
			<li>
			<?php
				if(isset($_COOKIE["user"])){
					include("db.php"); 
					$email = mysqli_real_escape_string($conn,$_COOKIE["user"]);
					$rs = mysqli_query($conn,"select * from user where email='$email'");
					if($r=mysqli_fetch_array($rs)){
					?>
						<div class="profile-details">
							<div class="profile-content">
								<img src="profile/<?php echo $r["code"]?>.jpg" alt="profileImg">
							</div>
							<div class="name-job">
								<div class="profile_name"><?php echo $r["name"]?></div>
							</div>
							<a href="logout.php"><i class='bx bx-log-out' ></i></a>
						</div>
					<?php
					}
					
				}
				else{
					?>
						<div class="profile-details">
							<div class="profile-content">
								<img src="profile.png" alt="profileImg">
							</div>
							<div class="name-job">
								<div class="profile_name">Rahul Bhati</div>
								<div class="job">Web Desginer</div>
							</div>
							<a href="register.php"><i class='bx bx-log-in' ></i></a>
						</div>
					<?php
				}
			?>
				
			</li>
		</ul>
	</div>
	<section class="home-section">
		<div class="home-content">
			<i class='bx bx-menu' ></i>
			<span class="text">Dashboard</span>
		</div>
		<div class="col-sm-12" id="record" style="margin-left:22px">
			<?php
				$rp=mysqli_query($conn,"select * from album_category");
				while($cat=mysqli_fetch_array($rp)){
			?>
				<div class="row">		
					<h3><b><?php echo $cat[2]?></b></h3><br><br>
					<?php
						$category_code = $cat[1];
						$rs=mysqli_query($conn,"select * from album where category_code='$category_code' limit 0,5");
						while($r=mysqli_fetch_array($rs)){
					?>
							<div class="col-sm-2">
								<div class="w3-card-4" style="width:13.5rem;cursor:pointer;">
									<table class="table table-borderless">
										<tr><td><img src="album/<?php echo $r["code"]; ?>.jpg" style="width:222px;height:200px;" class="img-fluid"/></td></tr>
										<tr><td><h4><center><strong class="card-title" id="<?php echo $r["code"]; ?>" rel="<?php echo $r["album_name"]; ?>"><?php echo $r["album_name"]; ?></strong>&nbsp;<i id="f<?php echo $r["code"]; ?>" rel="<?php echo $r["code"]; ?>" style="float:right;" class='bx bxs-heart' ></i></center></h4></td></tr>
									</table>
								</div>
							</div>
					<?php
						}
					?>
					<div class="col-sm-2">
						<div class="w3-card-4" style="width:10rem;height:18rem;">
							<div class="card-body">
								<h4 style="margin-top:7rem;cursor:pointer;"><center><button id="<?php echo $cat[1]?>" rel="<?php echo $cat[2]?>" class="btn btn-link">view all/-</button></center></h4>
							</div>
						</div>
					</div>
				</div><br><br>
			<?php
				}
			?>
		</div>
		<div class="row">
			<div class="wrapper">
			  <div class="divider div-transparent div-dot"></div>
			</div><br><br>
		</div><br><br>
		<div class="row" style="background-img:url(hand-g117619fb0_1920.jpg);margin-bottom:10px;">
				<div class="col-sm-12"></div>
				<div class="col-sm-12"></div>
				<div class="col-sm-6" style="padding:20px;">
					<div style="margin-left:40px;">
						<h3>Follow us on:</h3>
						<a href="" style="font-size:25px;color:black;"><i class='bx bxl-facebook-circle'></i></a> &nbsp;
						<a href="" style="font-size:25px;color:black;"><i class='bx bxl-instagram' ></i></a>&nbsp;
						<a href="" style="font-size:25px;color:black;"><i class='bx bxl-twitter' ></i></a>
					</div>
				</div>
				<div class="col-sm-6" style="padding:40px;">
					<center>© My Music.com <br> All rights reserved and created by Rahul Bhati</center>
				</div>
			</div>
			<div class="row">
			</div>
	</section>  
	<script>
		let arrow = document.querySelectorAll(".arrow");
		for (var i = 0; i < arrow.length; i++) {
			arrow[i].addEventListener("click", (e)=>{
				let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
				arrowParent.classList.toggle("showMenu");
			});
		}
		let sidebar = document.querySelector(".sidebar");
		let sidebarBtn = document.querySelector(".bx-menu");
		console.log(sidebarBtn);
		sidebarBtn.addEventListener("click", ()=>{
			sidebar.classList.toggle("close");
		});
	</script>
</body>
</html>
