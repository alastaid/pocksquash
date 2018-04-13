<?php
session_start();

ini_set('display_errors', TRUE);
if (isset($_COOKIE["email"]))
{
	include_once "connect_to_mysql.php";
	$email = $_COOKIE['email'];
	$email = strip_tags($email);
	$email = mysql_real_escape_string($email);
	/*$password = preg_replace("[^A-Za-z0-9]", "", $_POST['password']); // filter everything but numbers and letters*/
	$password = $_COOKIE['password'];
	$sql = mysql_query("SELECT * FROM membership WHERE email='$email' AND password='$password' AND emailactivated='1'");
	$login_check = mysql_num_rows($sql);
	if($login_check > 0)
	{
		$row = mysql_fetch_array($sql);
		$_SESSION['id'] = $row["id"];
		$_SESSION['email'] = $row["email"];
		$_SESSION['password'] =$row["password"];
		$_SESSION['firstname'] = $row["firstname"];
	}
}