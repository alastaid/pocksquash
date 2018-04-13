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
<title>PockSquash</title>
<link rel="stylesheet" type="text/css" href="psmain_m.css" />
<style type="text/css">
.auto-style1 {
	text-align: center;
}
</style>
</head>
<body>
<?php include ("mheaderbanner.php") ?>
<div class="body row scroll-y" align="center" id="MainBody" >
<div>
<?php
		if (isset($_SESSION["email"]))
		{
			
			echo "<p>Below is a list of the 5 teams entered in the York and District Squash League. 
					The stats of matches played, won, lost and league position will be updated weekly on a Monday evening.";
			echo "<h3><a name='top'>Quick Links</h3>";
			echo "<p><a href='teams.php#men1st'>Men's 1st Team<br>
					<a href='teams.php#men2nd'>Men's 2nd Team<br>
					<a href='teams.php#men3rd'>Men's 3rd Team<br>
					<a href='teams.php#men4th'>Men's 4th Team<br>
					<a href='teams.php#ladies1st'>Ladies' 1st Team<br></p>";
			
			echo "<h2><a name='men1st'>Men's 1st Team</h2>";
			echo "<h3>Stats</h3>";
			echo "<p>Played: 0<br>Won: 0<br>Lost: 0<br>League Position: N/A</p>";
			echo "<h3>Players</h3>";
			echo "<p>1. Alastair Dick<br>2. Jerome Remblance<br>3. Adam Hemmingway<br>4. Darren Eccles<br>5. Mark Smales (C)</p>";
			echo "<h3>Fixtures</h3>";
			echo "<p><table cellpadding='8'>
					<tr>
    					<th>Date</th>
     					<th>Team</th> 
    					<th>Venue</th>
    					<th>Result</th>
   				  	</tr>
  				  	<tr>
    					<td>15.09.15</td>
     					<td>Thornton Le Dale 1st</td> 
    					<td>Away</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>2.10.15</td>
     					<td>Wiggington 3rd</td> 
    					<td>Away</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>9.10.15</td>
     					<td>Dunnington 2nd</td> 
    					<td>Home</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>15.10.15</td>
     					<td>David Lloyd 1st</td> 
    					<td>Away</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>23.10.15</td>
     					<td>York 2nd</td> 
    					<td>Home</td>
    					<td></td>
   				  	</tr>
					<tr>
    					<td>3.11.15</td>
     					<td>Selby 1st</td> 
    					<td>Away</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>20.11.15</td>
     					<td>Stillington 2nd</td> 
    					<td>Home</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>6.12.15</td>
     					<td>York 3rd</td> 
    					<td>Away</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>11.12.15</td>
     					<td>York RI 2nd</td> 
    					<td>Home</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>-----</td>
     					<td>Christmas</td> 
    					<td>-----</td>
    					<td>-----</td>
   				  	</tr>
   				  	<tr>
    					<td>15.1.16</td>
     					<td>Wiggington 3rd</td> 
    					<td>Home</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>22.1.16</td>
     					<td>Dunnington 2nd</td> 
    					<td>Away</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>29.1.16</td>
     					<td>David Lloyd 1st</td> 
    					<td>Home</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>7.2.16</td>
     					<td>York 2nd</td> 
    					<td>Away</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>19.2.16</td>
     					<td>Selby 1st</td> 
    					<td>Home</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>6.3.16</td>
     					<td>Stillington 2nd</td> 
    					<td>Away</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>11.3.16</td>
     					<td>York 3rd</td> 
    					<td>Home</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>18.3.16</td>
     					<td>York RI 2nd</td> 
    					<td>Away</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>1.4.16</td>
     					<td>Thornton Le Dale 1st</td> 
    					<td>Home</td>
    					<td></td>
   				  	</tr>
				  </table></br>
					<a href='teams.php#top'>Back to the top</p>";
			
			echo "<h2><a name='men2nd'>Men's 2nd Team</h2>";
			echo "<h3>Stats</h3>";
			echo "<p>Played: 0<br>Won: 0<br>Lost: 0<br>League Position: N/A</p>";
			echo "<h3>Players</h3>";
			echo "<p>1. Harry Howley (C)<br>2. Paul Cockerill<br>3. John Hancock<br>4. Elaine Hancock<br>5. Martin Smith</p>";
			echo "<h3>Fixtures</h3>";
			echo "<p><table cellpadding='8'>
					<tr>
    					<th>Date</th>
     					<th>Team</th> 
    					<th>Venue</th>
    					<th>Result</th>
   				  	</tr>

					<tr>
    					<td>18.9.15</td>
     					<td>Stillington 4th</td> 
    					<td>Home</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>23.9.15</td>
     					<td>Thornton Le Dale 2nd</td> 
    					<td>Away</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>2.10.15</td>
     					<td>David Lloyd 2nd</td> 
    					<td>Home</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>8.10.15</td>
     					<td>Malton 3rd</td> 
    					<td>Away</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>16.10.15</td>
     					<td>Dunnington 4th</td> 
    					<td>Home</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>28.10.15</td>
     					<td>York 7th</td> 
    					<td>Away</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>6.11.15</td>
     					<td>Selby 3rd</td> 
    					<td>Home</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>17.11.15</td>
     					<td>York 8th</td> 
    					<td>Away</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>4.12.15</td>
     					<td>York RI 4th</td> 
    					<td>Home</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>13.12.15</td>
     					<td>Wiggington 5th</td> 
    					<td>Away</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>-----</td>
     					<td>Christmas</td> 
    					<td>-----</td>
    					<td>-----</td>
   				  	</tr>
   				  	<tr>
    					<td>8.1.16</td>
     					<td>Thornton Le Dale 2nd</td> 
    					<td>Home</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>13.1.16</td>
     					<td>David Lloyd 2nd</td> 
    					<td>Away</td>
    					<td></td>
   				  	</tr>
   				  	<tr>
    					<td>22.1.16</td>
     					<td>Malton 3rd</td> 
    					<td>Home</td>
    					<td></td>
   				  	</tr>
     				<tr>
    					<td>12.2.16</td>
     					<td>York 7th</td> 
    					<td>Home</td>
						<td></td>
   				  	</tr>
     				<tr>
    					<td>18.2.16</td>
     					<td>Selby 3rd</td> 
    					<td>Away</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>26.2.16</td>
     					<td>York RI 4th</td> 
    					<td>Away</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>4.3.16</td>
     					<td>York 8th</td> 
    					<td>Home</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>18.3.16</td>
     					<td>Wiggington 5th</td> 
    					<td>Home</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>3.5.16</td>
     					<td>Stillington 4th</td> 
    					<td>Away</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>10.5.16</td>
     					<td>Dunnington 4th</td> 
    					<td>Away</td>
						<td></td>
   				  	</tr>
				</table></br>
    				<a href='teams.php#top'>Back to the top</p>";
			
			echo "<h2><a name='men3rd'>Men's 3rd Team</h2>";
			echo "<h3>Stats</h3>";
			echo "<p>Played: 0<br>Won: 0<br>Lost: 0<br>League Position: N/A</p>";
			echo "<h3>Players</h3>";
			echo "<p>1. Ian Richardson (C)<br>2. Denise Bigg<br>3. Mark Danby<br>4. Pete Schoeneker<br>5. Les Grainger</p>";
			echo "<h3>Fixtures</h3>";
			echo "<p><i>NOTE: 2015/16 fixture list is currently unavailable. Fixtures will be added here when available.</i></p></br>";
			echo "<p><table cellpadding='8'>
					<tr>
						<th>Date</th>
						<th>Team</th>
						<th>Venue</th>
						<th>Result</th>
					</tr>
    						
    				<tr>
    					<td>20.9.15</td>
     					<td>Pocklington 4th</td> 
    					<td>(Away)</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>22.9.15</td>
     					<td>Stillington 5th</td> 
    					<td>Away</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>4.10.15</td>
     					<td>Dunnington 5th</td> 
    					<td>Home</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>7.10.15</td>
     					<td>Selby 4th</td> 
    					<td>Away</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>18.10.15</td>
     					<td>Thornton Le Dale 3rd</td> 
    					<td>Home</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>22.10.15</td>
     					<td>University Students 2nd</td> 
    					<td>Away</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>1.11.15</td>
     					<td>Ampleforth 1st</td> 
    					<td>Home</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>8.11.15</td>
     					<td>Wiggington 6th</td> 
    					<td>Away</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>15.11.15</td>
     					<td>Pocklington 4th</td> 
    					<td>(Home)</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>22.11.15</td>
     					<td>Dunnington 6th</td> 
    					<td>Home</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>1.12.15</td>
     					<td>Selby 5th</td> 
    					<td>Away</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>13.12.15</td>
     					<td>Malton 4th</td> 
    					<td>Home</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>-----</td>
     					<td>Christmas</td> 
    					<td>-----</td>
						<td>-----</td>
   				  	</tr>
    				<tr>
    					<td>10.1.16</td>
     					<td>Stillington 5th</td> 
    					<td>Home</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>17.1.16</td>
     					<td>Dunnington 5th</td> 
    					<td>Away</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>24.1.16</td>
     					<td>Selby 4th</td> 
    					<td>Home</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>31.1.16</td>
     					<td>Thornton Le Dale 3rd</td> 
    					<td>Away</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>7.2.16</td>
     					<td>University Students 2nd</td> 
    					<td>Home</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>11.2.16</td>
     					<td>Ampleforth 1st</td> 
    					<td>Away</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>21.2.16</td>
     					<td>Wiggington 6th</td> 
    					<td>Home</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>29.2.16</td>
     					<td>Dunnington 6th</td> 
    					<td>Away</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>13.3.16</td>
     					<td>Selby 5th</td> 
    					<td>Home</td>
						<td></td>
   				  	</tr>
    				<tr>
    					<td>16.3.16</td>
     					<td>Malton 4th</td> 
    					<td>Away</td>
						<td></td>
   				  	</tr>
    				</table></br>
    				<a href='teams.php#top'>Back to the top</p>";	
			
			echo "<h2><a name='men4th'>Men's 4th Team</h2>";
			echo "<h3>Stats</h3>";
			echo "<p>Played: 0<br>Won: 0<br>Lost: 0<br>League Position: N/A</p>";
			echo "<h3>Players</h3>";
			echo "<p>1. Louis Cameron<br>2. Matthew Dick (C)<br>3. Hortense Chan<br>4. Henry Palmer<br>5. TBD</p>";
			echo "<h3>Fixtures</h3>";
			echo "<p><i>NOTE: 2015/16 fixture list is currently unavailable. Fixtures will be added here when available.</i></p></br>";
			
			echo "<h2><a name='ladies1st'>Ladies' 1st Team</h2>";
			echo "<h3>Stats</h3>";
			echo "<p>Played: 0<br>Won: 0<br>Lost: 0<br>League Position: N/A</p>";
			echo "<h3>Players</h3>";
			echo "<p>1. Elaine Hancock<br>2. Sharon Watt<br>3. Jenny Huxtable<br>4. Helen Marsden<br>5. Shirley Smith</p>";
			echo "<h3>Fixtures</h3>";
			echo "<p><i>NOTE: 2015/16 fixture list is currently unavailable. Fixtures will be added here when available.</i></p></br>";
				
		}
		else
		{
		echo "<p><b>You must be logged in to view this page.</b></p>";
		}
		?>
</div>
</div>
<?php include ("mfooter.php") ?>
</body>
</html>
