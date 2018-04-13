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
<title>Club Members</title>
<link rel="stylesheet" type="text/css" href="psmain_m.css" />
</head>
<body>		
	<?php include ("mheaderbanner.php")?>
	<div class="body row scroll-y" align="center" id="MainBody" >
	<div class="body row scroll-x" align="center" id="table">
	<?php
	include_once 'connect_to_mysql.php';
	$result = mysql_query("SELECT * FROM membership");
	if ($result)
	{
	echo "<table border='0' cellpadding='5'>
	 <tr>
	 <td><b>Name</b></td>
	 <td><b>Phone</td>
	 </tr>";	
	 while($row = mysql_fetch_array($result))
		{
			echo "<tr>";
			echo "<td><a href='mmember_detail.php?linkid=".$row['id']."'>".$row['firstname']." ".$row['surname']."</a></td>";		
			if ($row['mobile'] <> "")
			{
				echo "<td>" . $row['mobile'] . "</td>";	
			}	
			else
			{
				echo "<td>" . $row['phone'] . "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	else
	{
	  header("location: ooops.php");
	}
	?>
	</div>
	</div>
	<?php include ("mfooter.php")?>
</body>
</html>
