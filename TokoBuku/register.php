<!-- Form Login & Check Session -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<?php include_once 'helper/template/include.php'; ?>
</head>
<body>
	<?php include_once 'helper/template/header.php'; ?>
	
	<!-- If user has logged in, Redirect to index.php -->

	<div class="container text-center login">
    	<div class="container">
	        <div class="card card-container">
	            <img id="profile-img" class="profile-img-card" src="public/image/asset/rovatar.png" />
	            <p id="profile-name" class="profile-name-card"></p>
	            <form class="form-signin" method="POST" action="./controller/doRegister.php">
	                <input type="text" name="txtUsername" id="inputUsername" class="form-control" placeholder="Username">
	                <input type="password" name="txtPassword" id="inputUsername" class="form-control" placeholder="Password">
	                <input type="password" name="txtConfirmPassword" id="inputUsername" class="form-control" placeholder="Confirm Password">
	                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Register</button>
	            </form>
	            <div class="errorMessage">
					<!-- Show Error Message -->
						<p style="color: red;">
							<!-- [Error Mesage] -->
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