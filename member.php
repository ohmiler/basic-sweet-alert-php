<?php 
	session_start();

	if ($_SESSION['level'] != 'member') {
		Header("Location: logout.php");
		exit();
	}
?>

<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<title>Hello, world!</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="row">
				<h1> Hi, Mr.<?php echo $_SESSION['username'];?> </h1>
				<hr>
				<div class="col-md-12">
					<h1>Welcome to member page</h1>

					<a href="logout.php" class="btn btn-danger" onclick="return confirm('ยืนยันการออกจากระบบ');">ออกจากระบบ</a>
				</div>
			</div>
		</div>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	</body>
</html>