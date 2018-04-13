<?php
require_once('class.phpmailer.php');
if ($_POST['email']) 
{
	//Connect to the database through our include 
	include_once "connect_to_mysql.php";
	$email = stripslashes($_POST['email']);
	$email = strip_tags($email);
	$email = mysql_real_escape_string($email);
	$sql = mysql_query("SELECT * FROM membership WHERE email='$email' AND emailactivated='1'"); 
	$login_check = mysql_num_rows($sql);
	if($login_check <> 1)
	{ 
		header("location: loginerror.php");
	}
	else 
	{
		$row = mysql_fetch_array($sql);
		$id = $row["id"];
		//Generate temporary password
		$password = '';
		$lchar = 0;
		$char = 0;
		for($i = 0; $i < 8; $i++)
		{
			while($char == $lchar)
			{
				$char = rand(48, 109);
				if($char > 57) $char += 7;
				if($char > 90) $char += 6;
			}
			$password .= chr($char);
			$lchar = $char;
		}
		//Write temp password to DB
		$hashedPass = md5($password);
		$sql = mysql_query("UPDATE membership SET password='$hashedPass' WHERE id='$id'");
		if ($sql)
		{
			//Send email with new pw and link
			$host = "ssl://smtp.gmail.com";
			$port = "465";
			$to = $email;
			// Change this to your site admin email
			$from = "xxxx@xxxx";
			$from_name = "Pocksquash";
			$subject = "Password Reset";
			//Begin HTML Email Message where you need to change the activation URL inside
			$body = "New temporary password is: ".$password;
			define('GUSER', 'xxxx@xxxx'); // GMail username
			define('GPWD', 'xxxx'); // GMail password
			$mail = new PHPMailer();  // create a new object
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true;  // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465;
			$mail->Username = GUSER;
			$mail->Password = GPWD;
			$mail->SetFrom($from, $from_name);
			$mail->Subject = $subject;
			$mail->Body = $body;
			$mail->AddAddress($to);
			if(!$mail->Send()) 
			{
				$error = 'Mail error: '.$mail->ErrorInfo;
				header("Location: ooops.php");
			}
			else 
			{
				$error = 'Message sent!';
				header("Location: passwordreset.php");
			}
		}
		else
		{
			header("location: ooops.php");
		}
	}
} // close while

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes"/>
<link rel="stylesheet" type="text/css" href="psmain_m.css" />
<title>Forgot Password</title>
<script type="text/javascript">
<!-- Form Validation -->
function validate_form ( ) { 
valid = true; 
if ( document.logform.email.value == "" ) { 
alert ( "Please enter your email" ); 
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
</head>
<body>
	<?php include ("mheaderbanner.php")?>
	<div class="body row scroll-y" align="center" id="MainBody" > 
	<br></br>
	<table align="center" cellpadding="5">
      <form action="mforgot_password.php" method="post" enctype="multipart/form-data" name="logform" id="logform" onsubmit="return validate_form ( );">
        <tr>
          <td class="style7" style="width: 344px"><div align="right">Email Address:</div></td>
          <td><input name="email" type="text" id="email" size="30" maxlength="64" /></td>
        </tr>  
        <tr>
          <td style="width: 344px">How many courts does the Francis Scaife have?</td>
          <td><input name="nofscourts" type="text"></td>
        </tr>
        <tr>
          <td style="width: 344px">Enter your email address and you will get a 
		  new temporary password sent to your email.</td>
          <td><input name="Submit" type="submit" value="Reset Password" /></td>
        </tr>
      </form>
    </table>
	 </div>
	 <?php include ("mfooter.php")?>
</body>
</html>