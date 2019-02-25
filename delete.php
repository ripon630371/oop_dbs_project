<?php
	include('functions.php');

	$obj = new basicData;
	$id = $_GET['id'];
	$data = $obj -> deletekoren($id);
	header('location:index.php');

?>