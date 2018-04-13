<?php 
session_start();
if (!isset($_SESSION['id']))
{
	header("location: notloggedin.php");
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="Pocklington, Squash, Sports" name="keywords" />
<link rel="stylesheet" type="text/css" href="CSS/psmain.css" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>SQL Injection Example</title>
</head>
<body>
<?php 
include ("headerbanner.php");?>
<div class="body row scroll-y" align="center" id="MainBody" >
<form action="sqlinjection.php" method="post" enctype="multipart/form-data" name="form" id="form" onsubmit="return validate_form ( );" >
<input name="firstname" type="text" id="firstname" value=""></input>
<input name="Submit" type="submit" value="Search" />
</form>
<?php
include_once 'connect_to_mysql.php';
if ($_POST['firstname'])
{	
	//$firstname = $_POST['firstname'];
	$firstname = ereg_replace("[^A-Za-z0-9]", "", $_POST['firstname']);
	$result = mysql_query("SELECT * FROM membership WHERE firstname='$firstname' ");
	if ($result)
	{
		echo "<table border='0' cellpadding='5'>
		 <tr>
		 <td><b>Name</b></td>
		 <td><b>Phone</td>
		 <td><b>Full Profile</td>
		 </tr>";
		while($row = mysql_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>" . $row['firstname'] . " " . $row['surname'] . "</td>";
			if ($row['mobile'] <> "")
			{
				echo "<td>" . $row['mobile'] . "</td>";
			}
			else
			{
				echo "<td>" . $row['phone'] . "</td>";
			}
			echo "<td><a href='member_detail.php?linkid=".$row['id']."'>".$row['firstname']."</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
}
?>
</div>
<?php include ("footer.php"); ?>
</body>
</html>
