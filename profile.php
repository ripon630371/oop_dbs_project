<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Profile Page</title>
	<style>
	body{
		font-family: 'Open Sans', sans-serif;;
		background: #000000;
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
			margin: auto;
			display: block;
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
		.info table tr td:first-child{
			text-align: right;
		}
		.info{
			margin-top: 50px;
			margin-bottom: 10px;
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
	?>
	<div class="pp">
		<img src="img/<?php echo $akla['image']; ?>" alt="">
		<hr>
		<div class="info">
			<table>
				<tr>
					<td>Name:</td>
					<td><?php echo $akla['name']; ?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?php echo $akla['email']; ?></td>
				</tr>
				<tr>
					<td>Cell:</td>
					<td><?php echo $akla['cell']; ?></td>
				</tr>
				<tr>
					<td>Batch:</td>
					<td><?php echo $akla['batch']; ?></td>
				</tr>
			</table>
		</div>
		<a href="index.php">Back Home Page</a>
	</div>
<?php endwhile;?>
</body>
</html>