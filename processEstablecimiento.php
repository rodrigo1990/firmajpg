<?php 
	session_start();

	$_SESSION['establecimiento'] = $_POST['establecimiento'];



	header('Location: index.php');

 ?>