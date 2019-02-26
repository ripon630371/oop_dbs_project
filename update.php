<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Profile Page</title>
	<style>
	body{
		font-family: 'Open Sans', sans-serif;;
		background: gray;
	}
		.pp{
			background: orange;
			width: 700px;
			margin: 100px auto;
			border-radius: 10px;
			padding: 50px;
		}
		.pp img{
			width: 200px;
			height: 200px;
			border: 5px solid #fff;
			box-shadow: 0px 0px 3px #cccc;
			border-radius: 5px;
		}
		.info table{
			width: 100%;
		}
		.info table tr:nth-child(even){
			background: #c9c9c9;
		}
		.info table tr td{
			padding: 5px;
		}
		.info table tr td input{
			padding: 5px;
			border: 1px solid #000;
		}
		.info table tr td:first-child{
			text-align: right;
			width: 200px;

		}
		.info{
			margin-top: 50px;
			margin-bottom: 10px;
		}
		.pro input{
			padding: 6px 15px;
			display: block;
		}
	</style>
</head>
<body>

	<?php

		include('functions.php');

		$obj = new basicData;

		$id = $_GET['id'];
		$amarPerJibon = $obj -> amarprofile($id);
		while($akla = $amarPerJibon-> fetch_assoc()) : 


		if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == "POST" ){

			$uimage = $_FILES['uimage']['name'];
			$uimaget = $_FILES['uimage']['tmp_name'];

			$exp 		= explode('.', $uimage);
			$ext 		= 	strtolower(end($exp ));

			$format 	= array('jpg','png','gif','jpeg');

			$uimagename = md5(time().$uimage).".".$ext ;


			if( empty($uimage)){
				$imgmess = "<h2 style='color:red;'> Select a Image First </h2>";
			}elseif( in_array($ext, $format) == false ){
				$imgmess =  "<h2 style='color:red;'> Image format is invalid </h2>";
			}else{

				$obj  -> chobiProborton($uimagename, $uimaget, $id );
			}
			

		}
	?>



	<div class="pp">
		<?php
			if( isset($imgmess) ){
			echo $imgmess; 
		}

		?>
		<img src="img/<?php echo $akla['image']; ?>" alt="">
		<div class="pro">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo  $akla['id']; ?>" method="POST" enctype="multipart/form-data">
				<input type="file" name="uimage">
				<input type="submit" name="submit" value="Update Profile Picture">
			</form>
		</div>
		<hr>
		<div class="info">
			<table>
				<tr>
					<td>Name:</td>
					<td><input type="text" value="<?php echo $akla['name']; ?>"></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="text" value="<?php echo $akla['email']; ?>"></td>
				</tr>
				<tr>
					<td>Cell:</td>
					<td><input type="text" value="<?php echo $akla['cell']; ?>"></td>
				</tr>
				<tr>
					<td>Batch:</td>
					<td><input type="text" value="<?php echo $akla['batch']; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Update Data"></td>
				</tr>
			</table>
		</div>
		<a href="index.php">Back Home Page</a>
	</div>
<?php endwhile;?>
</body>
</html>