<?php 

	session_start(); 
	require('connect.php');

?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<title>Basic Login + Sweet Alert</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12 mt-4">
					<h1>Sign In</h1>
					<hr>
					<form action="" method="post">
						<label for="username" class="form-label">Username</label>
						<input type="text" name="username" class="form-control" required placeholder="username">
						
						<label for="password" class="form-label">Password</label>
						<input type="password" name="password" class="form-control" required placeholder="password">

						<br>
						
						<div class="form-check form-check-inline">
						<input type="radio" class="form-check-input" name="level" value="admin" required>
						<label class="form-check-label" for="admin">Admin</label>
						</div>

						<div class="form-check form-check-inline">
						<input type="radio" class="form-check-input" name="level" value="member">
						<label class="form-check-label" for="member">Member</label>
						</div>

						<br><br>
						<button type="submit" class="btn btn-success">Sign In</button>
						<a href="signup.php" class="btn btn-primary">Sign Up</a>
					</form>
				</div>
			</div>
		</div>
		
		<?php
		//เรียกใช้งาน sweetalert
		echo '
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
		';
		//print_r($_POST);
		//isset ใช้เช็คว่ามีการส่ง method post ชื่อ username and password มาในหน้านี้หรือไม่
		if ( isset($_POST['username']) && isset($_POST['password'])  ) {
		//สร้างตัวแปร session username
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['level'] = $_POST['level'];

		//สร้างเงื่อนไขตรวจสอบว่าเป็น admin or member
		if ( $_SESSION['level'] == 'admin' ) {
		//admin
		$username = $_POST['username'];
		$password = $_POST['password'];
		//admin : username & password
		if ($username == 'admin' && $password == '1234') {
			Header("Location: admin.php");
		}else{
		echo '
			<script>
				setTimeout(function() {
				swal({
						title: "Admin Login Error!",
						text: "Username or Password is not correct, please try again.",
						type: "warning"
					}, function() {
					window.location = "index.php";
				});
				}, 1000);
			</script>
			';
		}
		 
		//member
		} else {
 
			$username = $_POST['username'];
			$password = $_POST['password'];
			//member :  : username & password
			if ($username == 'member' && $password == '1234') {
				Header("Location: member.php");
			} else {
				echo '
					<script>
						setTimeout(function() {
							swal({
								title: "User Login Error!",
								text: "Username or Password is not correct, please try again.",
								type: "warning"
							}, function() {
							window.location = "index.php";
							});
						}, 1000);
					</script>
				';
			}
			
		}
		
		}else{
		 
		}
		?>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	</body>
</html>