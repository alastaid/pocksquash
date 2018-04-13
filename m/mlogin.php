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
	if($login_check > 0){
		while($row = mysql_fetch_array($sql)){
			// Get member ID into a session variable
			$id = $row["id"];
			/*session_register('id');*/
			$_SESSION['id'] = $id;
			// Get member username into a session variable
			$_SESSION['email'] = $email;
			header("location: mhome.php");
			exit();
		} // close while
	}
	else
	{
		// Print login failure message to the user and link them back to your login page
		header("location: mloginerror.php");
		exit();
	}
}
else 
{
	if ($_POST['email']) 
	{
		//Connect to the database through our include 
		include_once "connect_to_mysql.php";
		$email = stripslashes($_POST['email']);
		$email = strip_tags($email);
		$email = mysql_real_escape_string($email);
		/*$password = preg_replace("[^A-Za-z0-9]", "", $_POST['password']); // filter everything but numbers and letters*/
		$password = md5($_POST['password']);
		// Make query and then register all database data that -
		// cannot be changed by member into SESSION variables.
		// Data that you want member to be able to change -
		// should never be set into a SESSION variable.
		$sql = mysql_query("SELECT * FROM membership WHERE email='$email' AND password='$password' AND emailactivated='1'"); 
		$login_check = mysql_num_rows($sql);
		if($login_check > 0)
		{ 
		    while($row = mysql_fetch_array($sql)){ 
		        // Get member ID into a session variable
		        $id = $row["id"];   
		        /*session_register('id');*/ 
		        $_SESSION['id'] = $id;
		        // Get member username into a session variable
			    $email = $row["email"];   
		        //session_register('email'); 
		        $_SESSION['email'] = $email;
		        // Update last_log_date field for this member now
		        mysql_query("UPDATE members SET lastlogin=now() WHERE id='$id'"); 
		        // Print success message here if all went well then exit the script
				header("location: mhome.php"); 
				setcookie('email', $email, time()+60*60*24*365);
				setcookie('password', $password, time()+60*60*24*365);
				exit();
		} // close while
		}
		else
		{
		// Print login failure message to the user and link them back to your login page
		 header("location: mloginerror.php");
		  exit();
		}
	}
}// close if post
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes"/>
<link rel="stylesheet" type="text/css" href="psmain_m.css" />
<title>Login</title>
<script type="text/javascript">
<!-- Form Validation -->
function validate_form ( ) { 
valid = true; 
if ( document.logform.email.value == "" ) { 
alert ( "Please enter your User Name" ); 
valid = false;
}
if ( document.logform.pass.value == "" ) { 
alert ( "Please enter your password" ); 
valid = false;
}
return valid;
}
<!-- Form Validation -->
</script>
<style type="text/css">
.auto-style1 {
	text-align: center;
}
</style>
</head>
<body>
	<?php include ("mheaderbanner.php")?>
	<div class="body row scroll-y" align="center" id="MainBody" > 
	<br></br>
	<table align="center" cellpadding="5">
      <form action="mlogin.php" method="post" enctype="multipart/form-data" name="logform" id="logform" onsubmit="return validate_form ( );">
        <tr>
          <td class="style7"><div align="right">Email Address:</div></td>
          <td><input name="email" type="text" id="email" size="30" maxlength="64" /></td>
        </tr>  
        <tr>
          <td class="style7"><div align="right">Password:</div></td>
          <td><input name="password" type="password" id="password" size="30" maxlength="24" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="Submit" type="submit" value="Login" /></td>
        </tr>
      </form>
    </table>
     <p class="auto-style1">Forgot your password? Click
	 <a href="mforgot_password.php">here</a></p>
	 <p class="auto-style1">Not got an account? Register <a href="mjoin_form.php">
	 <span class="auto-style1">here</span></a></p>
	 </div>
	 <?php include ("mfooter.php")?>
</body>
</html>