<?php
session_start();

ini_set('display_errors', FALSE);
if (isset($_COOKIE["email"]))
{
	include_once "connect_to_mysql.php";
	$email = $_COOKIE['email'];
	$email = strip_tags($email);
	$email = mysql_real_escape_string($email);
	/*$password = preg_replace("[^A-Za-z0-9]", "", $_POST['password']); // filter everything but numbers and letters*/
	$password = $_COOKIE['password'];
	$sql = mysql_query("SELECT * FROM membership WHERE email='$email' AND password='$password' AND emailactivated='1'");
	$login_check = mysql_num_rows($sql);
	if($login_check > 0)
	{
		$row = mysql_fetch_array($sql);
		$_SESSION['id'] = $row["id"];
		$_SESSION['email'] = $row["email"];
		$_SESSION['password'] =$row["password"];
		$_SESSION['firstname'] = $row["firstname"];
	}
}
?>
<div class="header row" id="TopBanner" >
	<img alt="" height="93" src="images/small_logo.png" style="float:right" width="142" /><img alt="" height="93" src="images/small_logo.png" style="float:left" width="142"  />
	<span id="MainTitle">Pocklington Squash Club</span>&nbsp;
	<p id="MainNav">&nbsp; 
	<a href="home.php"><span class="auto-style1">Home</span></a> |
	<a href="about.php"><span class="auto-style1">About</span></a> | 
	<a href="leagues.php"><span class="auto-style1">Leagues</span></a> | 
	<a href="teams.php"><span class="auto-style1">Teams</span></a> | 
	<a href="members.php"><span class="auto-style1">Members</span></a> |
	<?php
			if (isset($_SESSION["email"]))
   			{
				echo '<a href="member_profile.php">',$_SESSION["firstname"],'</a>';
			}	
			else 
 			{
 				echo '<a href="https://pocksquash.azurewebsites.net/login.php">Login</a>';
 			}	 
	?>
	</p>
</div>