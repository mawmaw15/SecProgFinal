<!-- Form Login & Check Session -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<?php include_once 'helper/template/include.php'; ?>
</head>
<body>
	<?php 
		include_once 'helper/template/header.php'; 

		if(isset($_SESSION['username'])) {
			header("location: ./index.php");
		}
	?>
	
	<!-- If user has logged in, Redirect to index.php -->

	<div class="container text-center login">
    	<div class="container">
	        <div class="card card-container">
	            <img id="profile-img" class="profile-img-card" src="public/image/asset/rovatar.png" />
	            <p id="profile-name" class="profile-name-card"></p>
	            <form class="form-signin" method="POST" action="./controller/doLogin.php">
					<input type="text" name="txtUsername" id="inputUsername" class="form-control" placeholder="Username" value=
					"<?php 
						if(isset($_COOKIE['username'])) {
							echo $_COOKIE['username'];
						}
					?>">
					<input type="password" name="txtPassword" id="inputUsername" class="form-control" placeholder="Password" value=
					"<?php 
						if(isset($_COOKIE['password'])) {
							echo $_COOKIE['password'];
						}
					?>">
	                <input type="checkbox" name="chkRemember" style="margin: 2; margin-bottom: 5%;">Remember Me
	                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Login</button>
	            </form>
	            <div class="errorMessage">
	            	<!-- Show Error Message -->
					<p style="color: red;"> 
						<?php
							if(isset($_SESSION['error'])) {
								echo $_SESSION['error'];

								// kalau errornya sudah ditunjukkan
								// jangan tunjukkan lagi
								unset($_SESSION['error']);
							}
						?>
					</p>
	        	</div>
	        </div>
        </div>
	</div>
	
	<?php include_once 'helper/template/footer.php'; ?>
</body>
</html>