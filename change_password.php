<?php 
session_start();
if (!isset($_SESSION['id'])) {
	header("location: notloggedin.php");
	exit();
}
include_once "connect_to_mysql.php";
if (isset($_POST['oldpassword']))
{
	$errormsg = "";
	$id = $_SESSION['id'];
	$oldpassword = ereg_replace("[^A-Za-z0-9]", "", $_POST['oldpassword']);
	$newpassword = ereg_replace("[^A-Za-z0-9]", "", $_POST['newpassword']);
	$retypepassword = ereg_replace("[^A-Za-z0-9]", "", $_POST['retypepassword']);
	$hashedpass = md5($oldpassword);
	$sql = mysql_query("SELECT * FROM membership WHERE id='$id' LIMIT 1");
	$count = mysql_num_rows($sql);
	if ($count > 1)
	{
		header("location: ooops.php");
		exit();
	}
	while($row = mysql_fetch_array($sql))
	{
		$email = $row["email"];
		$firstname = $row["firstname"];
		$surname = $row["surname"];
		$password = $row["password"];
	}
	if((!$oldpassword) || (!$newpassword) || (!$retypepassword))
	{
		$errormsg = "You need to put in your old password, and type the new password in both boxes.<br /><br />";
	}
	elseif ($hashedpass != $password )
	{
		$errormsg = "Old password isn't correct.";
	}
	elseif ($newpassword != $retypepassword)
	{
		$errormsg = "New passwords dont match.";
	}
	elseif (strlen($newpassword)<4)
	{
		$errormsg = "Password is too short.";
	}
	else
	{
		$hashednewpassword = md5($newpassword);
		$sql = mysql_query("UPDATE membership SET password='$hashednewpassword' WHERE id='$id'");
		if ($sql)
		{
			header("location: actioncompleted.php");
		}
		else
		{
			header("location: ooops.php");
		}
		exit();
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="CSS/psmain.css" />
</head>
<body>
<?php
include ("headerbanner.php");
session_start(); // Must start session first thing
//Connect to the database through our include 

// Query member data from the database and ready it for display
$id=$_SESSION['id'];
$sql = mysql_query("SELECT * FROM membership WHERE id='$id' LIMIT 1");
$count = mysql_num_rows($sql);
if ($count > 1) {
	header("location: ooops.php");
	exit();	
}
while($row = mysql_fetch_array($sql)){
$email = $row["email"];
$firstname = $row["firstname"];
$surname = $row["surname"];
$password = $row["password"];
}
?>
<div class="body row scroll-y" align="center" id="MainBody" >
<table width="80%" border="0" cellpadding="12">
 <tr>
      <td colspan="2" style="height: 33px"><font color="#FF0000"><?php echo "$errormsg"; ?>
	  </font></td>
      <td style="height: 33px; width: 162px;" class="auto-style1">&nbsp;</td>
      <td style="height: 33px">&nbsp;</td>
    </tr>
<form action="change_password.php" method="post" enctype="multipart/form-data" name="form" id="form" onsubmit="return validate_form ( );">
  <tr>
    <td>
    Old Password:
    <input name="oldpassword" type="password" id="oldpassword" />
    </td>
   </tr>
   <tr>
    <td>
    New Password:
    <input name="newpassword" type="password" id="newpassword" />
    </td>
   </tr>
   <tr>
    <td>
    Retype Password:
    <input name="retypepassword" type="password" id="retypepassword" />
    </td>
   </tr>
   <tr>
      <td><input name="Submit" type="submit" value="Change Password" /></td>
    </tr>
  </form>
</table>
</div>
<?php include ("footer.php")?>
</body>
</html>