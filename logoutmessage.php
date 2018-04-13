<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Pocklington Squash Club</title>
<meta content="Pocklington, Squash, Sports" name="keywords" />
<link rel="stylesheet" type="text/css" href="CSS/psmain.css" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Log Out</title>
</head>

<body>
<?php
include ("headerbanner.php");
session_start();
setcookie("email","",time()-3600);
setcookie("password","",time()-3600);
session_unset();
session_destroy();
if(!isset($_SESSION['id']))
{
	$msg = "You are now logged out";
}
else
{
	$msg = "<h2>Could not log you out</h2>";
}

?>
<div class="body row scroll-y" align="center" id="MainBody">
<p>
<?php echo "$msg"; ?>
</p>
<br />
<p><a href="home.php">Click here</a> to return to our home page </p>
</div>
<?php include ("footer.php")?>
</body>
</html>