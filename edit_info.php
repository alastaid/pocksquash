<?php 
session_start();
if (!isset($_SESSION['id']))
{
	header("location: notloggedin.php");
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
		  header("location: actioncompleted.php");
		}  
		else 
		{
		  header("location: ooops.php");
		}
		exit();
	}
  } // close if post
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edit Profile</title>
<link rel="stylesheet" type="text/css" href="CSS/psmain.css" />
</head>
<body>
<?php
session_start();
$id = $_SESSION['id'];
$sql = mysql_query("SELECT * FROM membership WHERE id='$id' LIMIT 1");
$count = mysql_num_rows($sql);
if ($count != 1)
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
	$mobile = $row["mobile"];
	$phone = $row["phone"];
	$twitterid = $row["twitterid"];
	$facebookid = $row["facebookid"];
	$youth = $row["youth"];
}
include ("headerbanner.php");
?>
<div class="body row scroll-y" align="center" id="MainBody" >
<table width="80%" border="0" cellpadding="12">
  <tr>
  <td width="78%">
    <?php
	$testpsfile="c:\\wamp\\www\\testps\\memberfiles\\".$id."\\pic1.jpg"; 
    $pifile = "/var/www/pocksquash/memberfiles/".$id."/pic1.jpg";
    $file = $pifile;
    
    if (file_exists($file))
    {
    	echo "<img src=memberfiles//".$id."//pic1.jpg width='100'>";
    	echo "<tr><a href='edit_pic.php'>Change Picture</a></tr>";
    }
    else 
    {
    	echo "<a href='edit_pic.php'>Add Picture</a>";
    }    
    ?>
  </td>
  </tr>
  <form action="edit_info.php" method="post" enctype="multipart/form-data" name="form" id="form" onsubmit="return validate_form ( );">
  <tr>
  <td>
    First Name:
    <input name="firstname" type="text" id="firstname" value="<?php echo "$firstname"; ?>" />
   </td>
   </tr>
   <tr>
   <td>
    Surname:
    <input name="surname" type="text" id="surname" value="<?php echo "$surname"; ?>" />
   </td>
   </tr>
   <tr>
   	<td>
   	Email:
   	<input name="email" type="text" id="email" value="<?php echo "$email"; ?>" />
   	</td> 
   </tr>
   <tr>
   	<td>
   	Mobile:
   	<input name="mobile" type="text" id="mobile" value="<?php echo "$mobile"; ?>" />
  	</td>
   </tr>
   <tr>
   	<td>
   	Phone:
   	<input name="phone" type="text" id="phone" value="<?php echo "$phone"; ?>" />
  	</td>
   </tr>
    <tr>
   	<td>
   	Twitter:
   	<input name="twitterid" type="text" id="twitterid" value="<?php echo "$twitterid"; ?>" />
  	</td>
    </tr>
    <tr>
   	<td>
   	Facebook:
   	<input name="facebookid" type="text" id="facebookid" value="<?php echo "$facebookid"; ?>" />
  	</td>
    </tr>
    <tr>
    <td>
    <input name="Submit" type="submit" value="Submit Changes" />
    </td>
    </tr>
  </form>
</table>
</div>
<?php include ("footer.php"); ?>
</body>
</html>