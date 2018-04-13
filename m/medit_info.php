<?php 
session_start();
if (!isset($_SESSION['id']))
{
	header("location: mnotloggedin.php");
	exit();
}
include_once "connect_to_mysql.php";
if ($_POST['firstname']) 
{
	if((!$firstname) || (!$surname) || (!$mobile && !$phone) || (!$youth) || (!$email) || (!$password) || (!$cpassword) || ($password != $cpassword))
	{
		$errormsg = "You did not submit the following required information!<br /><br />";
		if(!$firstname)
		{
			$errormsg .= "--- First Name";
		}
		if(!$surname)
		{
			$errormsg .= "--- Surname";
		}
		if(!$mobile && !$phone)
		{
			$errormsg .= "--- Include one phone number";
		}
		if(!$youth)
		{
			$errormsg .= "--- Age Group";
		}
		if(!$email)
		{
			$errormsg .= "--- Email Address";
		}
		if(!$password)
		{
			$errormsg .= "--- Password";
		}
		if(!$cpassword)
		{
			$errormsg .= "--- Confirm Password";
		}
		if($password != $cpassword)
		{
			$errormsg .= "--- Passwords do not match";
		}
	}
	else 
	{
		$id = $_SESSION['id'];
		$firstname = ereg_replace("[^A-Za-z0-9]", "", $_POST['firstname']); 
		$surname = ereg_replace("[^A-Z a-z0-9]", "", $_POST['surname']); 
		$mobile = ereg_replace("[^A-Z a-z0-9]", "", $_POST['mobile']); 
		$phone = ereg_replace("[^A-Z a-z0-9]", "", $_POST['phone']);
		$youth = ereg_replace("[^a-z]", "", $_POST['youth']); // filter everything but lowercase letters
		$email = stripslashes($_POST['email']);
		$email = strip_tags($email);
		$email = mysql_real_escape_string($email);
		$password = ereg_replace("[^A-Za-z0-9]", "", $_POST['password']); 
		$cpassword = ereg_replace("[^A-Za-z0-9]", "", $_POST['cpassword']);
		$twitterid = ereg_replace("[^A-Za-z0-9]", "", $_POST['twitterid']);
		$facebookid = ereg_replace("[^A-Za-z0-9]", "", $_POST['facebookid']);
		$sql = mysql_query("UPDATE membership SET firstname='$firstname', surname='$surname', email='$email', mobile='$mobile', phone='$phone', twitterid='$twitterid', facebookid='$facebookid' WHERE id='$id'");
		if ($sql)
		{
		  header("location: mactioncompleted.php");
		}  
		else 
		{
		  header("location: mooops.php");
		}
		exit();
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes"/>
<title>Edit Details</title>
<link rel="stylesheet" type="text/css" href="psmain_m.css" />
<style type="text/css">
.auto-style1 {
	text-align: right;
}
</style>
</head>
<body>
<?php
session_start();
$id = $_SESSION['id'];
$sql = mysql_query("SELECT * FROM membership WHERE id='$id' LIMIT 1");
$count = mysql_num_rows($sql);
if ($count <> 1)
{
	header("location: mooops.php");
	exit();	
}
while($row = mysql_fetch_array($sql))
{
	$email = $row["email"];
	$firstname = $row["firstname"];
	$surname = $row["surname"];
	$password = $row["password"];
	$mobile = $row["mobile"];
	$phone = $row["phone"];
	$twitterid = $row["twitterid"];
	$facebookid = $row["facebookid"];
	$youth = $row["youth"];
}
?>
<?php include("mheaderbanner.php"); ?>
<div class="body row scroll-y" align="center" id="MainBody" >
<form action="medit_info.php" method="post" enctype="multipart/form-data" name="form" id="form" onsubmit="return validate_form ( );" >
 <table width="80%" border="0" cellpadding="12">
    <tr>
    <td class="auto-style1">
    <?php
	$testpsfile="c:\\wamp\\www\\testps\\memberfiles\\".$id."\\pic1.jpg"; 
    $pifile = "/var/www/testps/memberfiles/".$id."/pic1.jpg";
    $file = $testpsfile;
    if (file_exists($file))
    {
    	echo "<img src=memberfiles/".$id."/pic1.jpg width='100'>";
    	echo "<a href='edit_pic.php'>Change Picture</a>";
    }
    else 
    {
    	echo "<a href='edit_pic.php'>Add Picture</a>";
    }    
    ?> 
    &nbsp;</td>
    </tr>
    <tr>
    <td class="auto-style1">
    First Name:&nbsp;
    </td>
    <td>
    <input name="firstname" type="text" id="firstname" value="<?php echo "$firstname"; ?>" /></td>
    </tr>
    <tr>
    <td class="auto-style1">
    Surname:&nbsp;
    </td>
    <td>
    <input name="surname" type="text" id="surname" value="<?php echo "$surname"; ?>" /></td>
    </tr>
    <tr>
   	<td class="auto-style1">
   	Email:&nbsp;
   	</td> 
   	<td>
   	<input name="email" type="text" id="email" value="<?php echo "$email"; ?>" /></td> 
    </tr>
    <tr>
   	<td class="auto-style1">
   	Mobile:&nbsp;
  	</td>
   	<td>
   	<input name="mobile" type="text" id="mobile" value="<?php echo "$mobile"; ?>" /></td>
    </tr>
    <tr>
   	<td class="auto-style1">
   	Phone:&nbsp;
  	</td>
   	<td>
   	<input name="phone" type="text" id="phone" value="<?php echo "$phone"; ?>" /></td>
    </tr>
    <tr>
   	<td class="auto-style1">
   	Twitter:&nbsp;
  	</td>
   	<td>
   	<input name="twitterid" type="text" id="twitterid" value="<?php echo "$twitterid"; ?>" /></td>
    </tr>
    <tr>
   	<td class="auto-style1">
   	Facebook:&nbsp;
  	</td>
   	<td>
   	<input name="facebookid" type="text" id="facebookid" value="<?php echo "$facebookid"; ?>" /></td>
    </tr>
    <tr>
    <td>
    &nbsp;</td>
    <td>
    <input name="Submit" type="submit" value="Submit Changes" />
    </td>
    </tr>
 </table>
</form> 
</div>
<?php include ("mfooter.php"); ?>
</body>
</html>