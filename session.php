<?php
	include_once("config.php");
	session_start();

	$user_check = $_SESSION['login_user'];

	$ses_sql = pg_query($db,"SELECT * FROM users WHERE username = '$user_check'");

	if(!isset($_SESSION['login_user'])){
		header("location: login.php");
	}
?>
