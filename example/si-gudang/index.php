<html>
<head>
	<title> LOGIN </title>
	<link href="opsi/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="opsi/vendor/bootstrap/css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div class="container">
	
	<br />
		<div class="login-container">
		

			<div id="output">
				<?php 
				if (isset($_GET['alert'])=='gagal') {
					echo "
					<div class='alert alert-danger'>
					Username Dan Password Salah 
					</div>";
				}
				?>
			</div>
			<br />
			<div class="bunder">
				<img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/01.jpg" alt="">
			</div>
			<br />
			<div class="form-box">
				<form action="login.php" methode="POST">
				<div class="card-title">
					<center>
					<input type="text" name="User_Name"  placeholder="Username" size="30">
					</center>
				</div>
				<div class="card-title">
					<center>
					<input type="password" name="User_Password" placeholder="User_Password" size="30">
					</center>
				</div>
					<button class="btn btn-info btn-block login" type="submit">Login</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>