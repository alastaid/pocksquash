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
<title>Member Detail</title>
<link rel="stylesheet" type="text/css" href="psmain_m.css" />
<style type="text/css">
.auto-style1 {
	text-align: center;
}
.auto-style2 {
	text-align: right;
}
.auto-style3 {
	text-align: left;
}
</style>
</head>
<body>
<?php
include ("mheaderbanner.php");
session_start(); // Must start session first thing
//Connect to the database through our include 
include_once "connect_to_mysql.php";
// Query member data from the database and ready it for display
$linkid=$_GET['linkid'];
$sql = mysql_query("SELECT * FROM membership WHERE id='$linkid' LIMIT 1");
$count = mysql_num_rows($sql);
if ($count <> 1) {
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
     
      <table style="width: 100%">
		  <tr>
			  <td class="auto-style1" colspan="2">
			  <?php
			  $testpsfile="c:\\wamp\\www\\testps\\memberfiles\\".$linkid."\\pic1.jpg";
			  $pifile = "/var/www/testps/memberfiles/".$linkid."/pic1.jpg";
			  $file = $testpsfile;
			  if (file_exists($file))
			  {
			    echo "<img src=../memberfiles/".$linkid."/pic1.jpg width='100'>";
			  }
			  else
			  {
			    echo "<h2>No Picture</h2>";
			  }
			  ?>
			  </td>
		  </tr>
		  <tr>
			  <td class="auto-style1" colspan="2"><?php echo $firstname." ".$surname ?></td>
		  </tr>
		  <tr>
			  <td class="auto-style2" style="width: 50%">Email:</td>
			  <td class="auto-style3"><?php echo $email ?></td>
		  </tr>
		  <tr>
			  <td class="auto-style2" style="width: 50%"> Mobile:</td>
			  <td class="auto-style3"><?php echo $mobile ?></td>
		  </tr>
		  <tr>
			  <td class="auto-style2" style="width: 614px">Phone:</td>
			  <td class="auto-style3"><?php echo $phone ?></td>
		  </tr>
		  <tr>
			  <td class="auto-style2" style="width: 614px">Twitter:</td>
			  <td class="auto-style3">
			  <?php 
			      if ($twitterid <> "")
			      {	
			      	$twitterurl = "http://twitter.com/".$twitterid.'"';
			        echo '<a href="'.$twitterurl.'">@'.$twitterid.'</a>';
			      }
			      ?>
			  </td>
		  </tr>
		  <tr>
			  <td class="auto-style2" style="width: 614px">Facebook:</td>
			  <td class="auto-style3"><?php echo $facebookid?></td>
		  </tr>
	  </table>
    </td>
  </tr>
</table>
</div>
<?php include ("mfooter.php")?>
</body>
</html>