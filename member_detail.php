<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PockSquash - Member Profile</title>
<link rel="stylesheet" type="text/css" href="CSS/psmain.css" />
</head>
<body>
<?php
include ("headerbanner.php");
session_start(); // Must start session first thing
//Connect to the database through our include 
include_once "connect_to_mysql.php";
// Query member data from the database and ready it for display
$linkid=$_GET['linkid'];
$sql = mysql_query("SELECT * FROM membership WHERE id='$linkid' LIMIT 1");
$count = mysql_num_rows($sql);
if ($count > 1) {
	echo "There is no user with that id here.";
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
<table width="80%" border="0" cellpadding="12">
  <tr>
    <td width="78%">
    <?php
    $testpsfile="c:\\wamp\\www\\testps\\memberfiles\\".$linkid."\\pic1.jpg";
    $pifile = "/var/www/pocksquash/memberfiles/".$linkid."/pic1.jpg";
    $file = $pifile; 
    if (file_exists($file))
    {
    	echo "<img src=memberfiles/".$linkid."/pic1.jpg width='100'>";
    }
    else 
    {
    	echo "<h2>No Picture</h2>";
    }
    
    
    ?>
    
    </td>
  </tr>
</table>
<table width="90%" align="center" cellpadding="5" cellspacing="5" style="line-height:1.5em;">
  <tr>
    <td width="20%" rowspan="2" valign="top">
      <?php echo $firstname." ".$surname ?> <br />
      Email: <a href="mailto:<?php echo $email ?>"><?php echo $email?></a><br />
      Mobile: <?php echo $mobile ?><br />
      Phone: <?php echo $phone ?><br />
      Twitter:
      <?php 
      if ($twitterid <> "")
      {	
      	$twitterurl = "http://twitter.com/".$twitterid.'"';
        echo '<a href="'.$twitterurl.'">@'.$twitterid.'</a>';
      }
      ?>
      <br />
      Facebook: <?php echo $facebookid?> <br />
    </td>
  </tr>
</table>
</div>
<?php include ("footer.php")?>
</body>
</html>