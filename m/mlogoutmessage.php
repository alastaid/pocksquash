<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes"/>
<link rel="stylesheet" type="text/css" href="psmain_m.css" />
<meta content="Pocklington, Squash, Sports" name="keywords" />
<title>Log Out</title>
<style type="text/css">
.auto-style1 {
	text-align: center;
}
</style>
</head>

<body>
<?php
session_start();
setcookie("email","",time()-3600);
setcookie("password","",time()-3600);
session_unset();
session_destroy();
include ("mheaderbanner.php");
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
<div class="auto-style1">

<p>
<?php echo "$msg"; ?>
</p>
<br />
<p><a href="mhome.php">Click here</a> to return to our home page </p>
</div>
</div>
<?php include ("mfooter.php")?>
</body>
</html>