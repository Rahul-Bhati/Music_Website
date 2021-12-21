<?php 
	if(isset($_REQUEST["text"])){
		?>
		<div class="title">Login</div>
		<div class="content">
			<form action="check.php" method="post">
				<div class="user-details">
				<div class="input-box">
					<span class="details">Email</span>
					<input type="text" name="email" placeholder="Enter your email" required>
				</div>
				<div class="input-box">
					<span class="details">Password</span>
					<input type="password" name="pass" placeholder="Enter your password" required>
				</div>
				<div class="button">
					<input type="submit" class="btn btn-info" value="Login">
				</div>
			</form>
		</div>
		<?php
	}


?>