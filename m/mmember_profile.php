<?php 
session_start();
if (!isset($_SESSION['id']))
{
	header("location: mnotloggedin.php");
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes"/>
<title>Member Profile</title>
<link rel="stylesheet" type="text/css" href="psmain_m.css" />
<style type="text/css">
.auto-style1 {
	text-align: center;
}
</style>
</head>
<body>
<div class="auto-style1">
<?php
include ("mheaderbanner.php");
session_start(); 
include_once "connect_to_mysql.php";
$id=$_SESSION['id'];
$sql = mysql_query("SELECT * FROM membership WHERE id='$id' LIMIT 1");
$count = mysql_num_rows($sql);
if ($count <> 1) 
{
	header("location: mooops.php");
	exit();	
}
while($row = mysql_fetch_array($sql)){
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
<div class="body row scroll-y" align="center" id="MainBody" >
<table width="90%" align="center" cellpadding="5" cellspacing="5" style="line-height:1.5em;">
  <tr>
    <td width="20%" rowspan="2" valign="top" class="auto-style1">
      <div class="auto-style1">
       <?php
	    $testpsfile="c:\\wamp\\www\\testps\\memberfiles\\".$id."\\pic1.jpg";
	    $pifile = "/var/www/testps/memberfiles/".$id."/pic1.jpg";
	    $file = $testpsfile;
	    if (file_exists($file))
	    {
	    	echo "<img src=..//memberfiles//".$id."//pic1.jpg width='100'><br />";
	    }
	    else 
	    {
	    	echo "<h4>No Picture</h4>";
	    }  
	    ?>  
      <?php echo "$firstname"." "."$surname" ?> <br />
      Email: <?php echo $_SESSION['email']?> <br />
      Mobile: <?php echo "$mobile" ?><br />
      Phone: <?php echo "$phone"?><br />
      Twitter: <?php echo "$twitterid"?> <br />
      Facebook: <?php echo "$facebookid"?> <br />
      Membership: <?php 
      if ($youth == 'a')
      {
      	echo "Junior<br />";
      }
      else 
      {
      	echo "Adult<br />";
      }
	  $testpsfile="c:\\wamp\\www\\testps\\memberfiles\\".$id."\\pic1.jpg"; 
	  $pifile = "/var/www/testps/memberfiles/".$id."/pic1.jpg";
	  $file = $testpsfile; 
      if (!file_exists($file))
      {	 
         echo "Click <a href='medit_pic.php'>here</a> to upload a picture.<br />";
      }
      ?>
      <a href="medit_info.php">Edit Details</a><br />
      <a href="mchange_password.php">Change Password</a><br /> 
      <a href="mlogout.php"> Logout</a><br />
      </div>
    </td>
  </tr>
</table>
</div>
<?php include ("mfooter.php")?>
</div>
</body>
</html>