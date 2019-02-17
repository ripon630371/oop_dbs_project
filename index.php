<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Students Creat System</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
	if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == "POST" ){
		$name  	= $_POST['name'];
		$email 	= $_POST['email'];
		$cell 		= $_POST['cell'];
		$batch 	= $_POST['batch'];
		$image 	= $_FILES['image']['name'];
		$imaget 	= $_FILES['image']['tmp_name'];


		if(empty($name) || empty($email) || empty($cell) || empty($batch) || empty($image)){
			echo "<h2 style ='color: red;'> File Must Be Not Empty</h2>";
		}elseif(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
			echo "<h2 style ='color: red;'> Invalid Email Address</h2>";
		}
	}
	

	?>

	<div class="data-ins">
		<h2>Creat a Student</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Name:</td>
					<td><input name="name" type="text"></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input name="email" type="text"></td>
				</tr>
				<tr>
					<td>Cell:</td>
					<td><input name="cell" type="text"></td>
				</tr>
				<tr>
					<td>Batch:</td>
					<td><input name="batch" type="text"></td>
				</tr>
				<tr>
					<td>Image:</td>
					<td><input name="image" type="file"></td>
				</tr>
				<tr>
					<td></td>
					<td><input name="submit" type="submit" value="Creat student"></td>
				</tr>
			</table>
		</form>
	</div>
	<hr>
	<div class="student-data">
		<table>
			<tr>
				<td><a href="#"><img src="img/p.jpg" alt=""></a></td>
				<td>
					<h2>Mark Zukarbark</h2>
					<h3>mar01@gmail.com</h3>
					<p>01770766181</p>
					<a href="#">Edit</a>
					<a href="#">Delete</a>
				</td>
			</tr>
			<tr>
				<td><a href="#"><img src="img/p.jpg" alt=""></a></td>
				<td>
					<h2>Mark Zukarbark</h2>
					<h3>mar01@gmail.com</h3>
					<p>01770766181</p>
					<a href="#">Edit</a>
					<a href="#">Delete</a>
				</td>
			</tr>
			<tr>
				<td><a href="#"><img src="img/p.jpg" alt=""></a></td>
				<td>
					<h2>Mark Zukarbark</h2>
					<h3>mar01@gmail.com</h3>
					<p>01770766181</p>
					<a href="#">Edit</a>
					<a href="#">Delete</a>
				</td>
			</tr>
			<tr>
				<td><a href="#"><img src="img/p.jpg" alt=""></a></td>
				<td>
					<h2>Mark Zukarbark</h2>
					<h3>mar01@gmail.com</h3>
					<p>01770766181</p>
					<a href="#">Edit</a>
					<a href="#">Delete</a>
				</td>
			</tr>
			<tr>
				<td><a href="#"><img src="img/p.jpg" alt=""></a></td>
				<td>
					<h2>Mark Zukarbark</h2>
					<h3>mar01@gmail.com</h3>
					<p>01770766181</p>
					<a href="#">Edit</a>
					<a href="#">Delete</a>
				</td>
			</tr>
			<tr>
				<td><a href="#"><img src="img/p.jpg" alt=""></a></td>
				<td>
					<h2>Mark Zukarbark</h2>
					<h3>mar01@gmail.com</h3>
					<p>01770766181</p>
					<a href="#">Edit</a>
					<a href="#">Delete</a>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>