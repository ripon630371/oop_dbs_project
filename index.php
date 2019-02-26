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
	include('functions.php');

	$obj = new basicData;

	if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == "POST" ){
		$name  	= $_POST['name'];
		$email 	= $_POST['email'];
		$cell 	= $_POST['cell'];
		$batch 	= $_POST['batch'];
		$image 	= $_FILES['image']['name'];
		$imaget = $_FILES['image']['tmp_name'];

		$exp 	= explode('.',$image);
		$ext 	= strtolower(end($exp ));

		$formate = array('jpg','jpeg','png','gif');
		$uimage  = md5(time().$image).".".$ext;

		$emailcheck = $obj -> emailAseKiNa($email);


		if(empty($name) || empty($email) || empty($cell) || empty($batch) || empty($image)){
			echo "<h2 style ='color: red;'> File Must Be Not Empty</h2>";
		}elseif(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
			echo "<h2 style ='color: red;'> Invalid Email Address</h2>";
		}elseif(in_array($ext,$formate) == false){
			echo "<h2 style ='color: red;'> Image Formate Invalid</h2>";
		}elseif ($emailcheck == false) {
			echo "<h2 style ='color: red;'> Email Already Exists </h2>";
		}else{
			$data = $obj -> studentDataInsert($name,$email,$cell,$batch,$uimage,$imaget);

			echo $data;
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

			<?Php
				$student = $obj -> dataaso();
				while($dd = $student-> fetch_assoc()):

			?>
			<tr>
				<td><a href="profile.php?id=<?php echo $dd['id'];?>"><img src="img/<?php echo $dd['image'];?>" alt=""></a></td>
				<td>
					<h2><?php echo $dd['name'];?></h2>
					<h3><?php echo $dd['email'];?></h3>
					<p><?php echo $dd['cell'];?></p>
					<a href="update.php?id=<?php echo $dd['id'];?>">Edit</a>
					<a href="delete.php?id=<?php echo $dd['id'];?>">Delete</a>
				</td>
			</tr>
		<?php endwhile;?>
			
		</table>
	</div>
</body>
</html>