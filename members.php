



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link rel="stylesheet" type="text/css" href="CSS/psmain.css" />
<title>Members</title>
</head>

<body>
		
		<?php include ("headerbanner.php")?>
		<div class="body row scroll-y" align="center" id="MainBody" >
		<div class="body row scroll-x" align="center" id="table">
		<?php
		if (isset($_SESSION["email"]))
		{
			include_once 'connect_to_mysql.php';
			$result = mysql_query("SELECT * FROM membership");
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
						echo "<td>" . $row['house'] . "</td>";
					}
					echo "<td>" . " <a href='member_detail.php?linkid=".$row['id']."'>".$row['firstname']."</a>" . "</td>";
					
					/*echo "<td>" . $row[''] . "</td>";
					echo "<td>" . $row['email'] . "</td>";*/

					echo "</tr>";
				}
				echo "</table>";
		}
		else
		{
		echo "You must be logged in to view this page.";
		}
		?>
		</div>
		</div>
		<?php include ("footer.php")?>

</body>

</html>
