<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-gb" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link rel="stylesheet" type="text/css" href="CSS/psmain.css" />
<title>Leagues</title>
<style type="text/css">
.auto-style1 {
	text-align: center;
}
</style>
</head>

<body>
		<?php include ("headerbanner.php")?>
		<div class="body row scroll-y" align="center" id="MainBody" >
		<?php
		if (isset($_SESSION["email"]))
		{
			echo "<style>
					table, th, td 
					{
    					border: 1px solid black;
    					border-collapse: collapse;
					}				
			      </style>
			      <p>Find and submit the latest mini-league results here, as well as details of the end of season competitions.</p>
				  <p>Click <a href='submitmatch.php'>here</a> to submit a result.</p>
				  <h2>September Mini-Leagues</h2>
				  <p>The September mini-leagues are not yet available, so here is a preview of how they will look.</p>
			      <p><table cellpadding='8'>
  					<tr>
    					<td><b>League 1</b></td>
					    <td><b>AD</b></td>		
					    <td><b>MS</b></td>
						<td><b>JR</b></td>
						<td><b>AH</b></td>
						<td><b>DE</b></td>
				    </tr>
				    <tr>
					    <td><b>Alastair Dick</b></td>
					    <td bgcolor='#000000'></td>		
					    <td></td>
						<td></td>
						<td></td>
						<td></td>
				    </tr>
				    <tr>
					    <td><b>Mark Smales</b></td>
					    <td></td>		
					    <td bgcolor='#000000'></td>
						<td></td>
						<td></td>
						<td></td>
  					</tr>
					<tr>
					    <td><b>Jerome Remblance</b></td>
					    <td></td>		
					    <td></td>
						<td bgcolor='#000000'></td>
						<td></td>
						<td></td>
  					</tr>
					<tr>
					    <td><b>Adam Hemmingway</b></td>
					    <td></td>		
					    <td></td>
						<td></td>
						<td bgcolor='#000000'></td>
						<td></td>
  					</tr>
					<tr>
					    <td><b>Darren Eccles</b></td>
					    <td></td>		
					    <td></td>
						<td></td>
						<td></td>
						<td bgcolor='#000000'></td>
  					</tr>
				  </table>";

		}
		else
		{
		echo "<p><b>You must be logged in to view this page.</b></p>";
		}
		?>
		</div>
		<?php include ("footer.php")?>

</body>

</html>
