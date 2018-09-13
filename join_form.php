<?php

require_once('logic/class.phpmailer.php');
require_once('logic/class.smtp.php');
$errorMsg = ""; 
// if something is posted back through the form
if (isset($_POST['email'])){
	//Connect to the database through our include 
	include_once "connect_to_mysql.php";
	// Filter the posted variables
	$firstname = ereg_replace("[^A-Za-z0-9]", "", $_POST['firstname']); // filter everything but numbers and letters
	$surname = ereg_replace("[^A-Z a-z0-9]", "", $_POST['surname']); // filter everything but spaces, numbers, and letters
	$mobile = ereg_replace("[^A-Z a-z0-9]", "", $_POST['mobile']); // filter everything but spaces, numbers, and letters
	$phone = ereg_replace("[^A-Z a-z0-9]", "", $_POST['phone']); // filter everything but spaces, numbers, and letters
	$youth = ereg_replace("[^a-z]", "", $_POST['youth']); // filter everything but lowercase letters
	$email = stripslashes($_POST['email']);
	$email = strip_tags($email);
	$email = mysql_real_escape_string($email);
	$password = ereg_replace("[^A-Za-z0-9]", "", $_POST['password']); // filter everything but numbers and letters
	$cpassword = ereg_replace("[^A-Za-z0-9]", "", $_POST['cpassword']);
	$twitterid = ereg_replace("[^A-Za-z0-9]", "", $_POST['twitterid']);
	$facebookid = ereg_replace("[^A-Za-z0-9]", "", $_POST['facebookid']);
	$nofscourts = ereg_replace("[^A-Za-z0-9]", "", $_POST['nofscourts']);
	// and all the forms needed are not filled in show error
	if((!$firstname) || (!$surname) || (!$mobile && !$phone) || (!$youth) || (!$email) || (!$password) || (!$cpassword) || ($password != $cpassword))
	{
		
		$errorMsg = "You did not submit the following required information!<br /><br />";
		if(!$firstname)
		{
			$errorMsg .= "--- First Name";
		}
		if(!$surname)
		{
			$errorMsg .= "--- Surname"; 
		}
		if(!$mobile && !$phone)
		{ 
		    $errorMsg .= "--- Include one phone number"; 
	    }
	    if(!$youth)
	    { 
	       $errorMsg .= "--- Age Group"; 
	    }
	    if(!$email)
	    { 
	       $errorMsg .= "--- Email Address"; 
	    }
	    if(!$password)
	    { 
	       $errorMsg .= "--- Password"; 
	    }
	    if(!$cpassword)
	    {
	   	   $errorMsg .= "--- Confirm Password";
	    }
	    if($password != $cpassword)
	    {
	   	   $errorMsg .= "--- Passwords do not match";	   
	    }
	}
	else
	// all fields are filled in carry on
	{
	// Database duplicate Fields Check
	//$sql_username_check = mysql_query("SELECT id FROM membership WHERE email='$email' LIMIT 1");
	$sql_email_check = mysql_query("SELECT id FROM membership WHERE email='$email' LIMIT 1");
	//$username_check = mysql_num_rows($sql_email_check);
	$email_check = mysql_num_rows($sql_email_check);
	// if email does exist 
	if ($email_check > 0)
	{ 
		$errorMsg = "<u>ERROR:</u><br />Your Email address is already in use inside our system. Please try another.";
	} else 
		// carry on all fields required and unique email
	    {
	    // if 	
		if ($nofscourts == "2")
			{
			// Add MD5 Hash to the password variable
	        $hashedPass = md5($password); 
			// Add user info into the database table, claim your fields then values 
			$sql = mysql_query("INSERT INTO membership (firstname, surname, email, password, twitterid, facebookid, youth, mobile, phone) 
			VALUES('$firstname','$surname','$email','$hashedPass','$twitterid','$facebookid','$youth','$mobile','$phone' )") or die (mysql_error());
			$consumerKey    = 'xxxx';
			$consumerSecret = 'xxxx';
			$oAuthToken     = 'xxxx';
			$oAuthSecret    = 'xxxx';
			require_once('twitteroauth.php');
			// create a new instance
			$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthSecret);
			//send a tweet
			$tweet->post('statuses/update', array('status' => $firstname.' has just joined the site!  Welcome.'));
			// Get the inserted ID here to use in the activation email
			$host = "ssl://smtp.gmail.com";
			$port = "465";
			$to = "xxxx";
			// Change this to your site admin email
			$from = "xxxx";
			$from_name = "Pocksquash";
			$subject = "Request from: ".$firstname." ".$surname." email: ".$email;
			//Begin HTML Email Message where you need to change the activation URL inside
			$body = "Request for enabling.";
			define('GUSER', 'xxxx'); // GMail username
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
			if(!$mail->Send()) {
				$error = 'Mail error: '.$mail->ErrorInfo;
				header("Location: emailerrormessage.php");
			} else {
				$error = 'Message sent!';
				header("Location: emailsentmessage.php");
			}		 
		    exit(); // Exit so the form and page does not display, just this success message
	        }
	        else 
	        {
	        	header("Location: emailerrormessage.php");
	        	exit();
	        }	
    	} // Close else after database duplicate field value checks
    } // Close else after missing vars check
} //Close if $_POST
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="CSS/psmain.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PockSquash - Member Registration</title>
<style type="text/css">
.auto-style1 {
	text-align: right;
}
.auto-style2 {
	text-align: center;
}
</style>
</head>
<body>
<?php include("headerbanner.php")?>
<div class="body row scroll-y" align="center" id="MainBody" >
<p>
To get access to certain sections of the web site, you need to register.  To successfully register you must have
paid your subs for the year.   Once the form is submitted it will be checked against the membership list and you will
get an email confirming your registration.  
</p>
<table width="800" align="center" cellpadding="4">
  <tr>
    <td width="7%">&nbsp;</td>
  </tr>
</table>
<table width="800" align="center" cellpadding="5" style="font-size:medium">
  <form action="join_form.php" method="post" enctype="multipart/form-data">
    <tr>
      <td colspan="2" style="height: 33px"><font color="#FF0000"><?php echo "$errorMsg"; ?>
	  </font></td>
      <td style="height: 33px; width: 162px;" class="auto-style1">&nbsp;</td>
      <td style="height: 33px">&nbsp;</td>
    </tr>
    <tr>
      <td style="width: 126px"><div align="right">*Email:</div></td>
      <td align="left" style="width: 265px"><input name="email" tabindex=1 type="text" value="<?php echo "$email"; ?>" /></td>
      <td class="auto-style1" style="width: 162px">Mobile:</td>
      <td align="left"><input name="mobile" tabindex=6 type="text" value="<?php echo "$mobile"; ?>" />
      <font size="-2" color="red">(Please give at least one phone number)</font></td>
    </tr>
    <tr>
      <td style="width: 126px"><div align="right">*First Name:</div></td>
 	  <td align="left" style="width: 265px"><input name="firstname" tabindex=2 type="text" value="<?php echo "$firstname"; ?>" />
      <td style="width: 162px"><div align="right">House Phone: </div></td>
      <td align="left"><input name="phone" tabindex=7 type="text" value="<?php echo "$phone"; ?>" />
      <font size="-2" color="red">(Please give at least one phone number)</font></td>
    </tr>
    <tr>
      <td style="width: 126px"><div align="right">*Surname: </div></td>
      <td align="left" style="width: 265px"><input name="surname" tabindex=3 type="text" value="<?php echo "$surname"; ?>" /></td>
      <td style="width: 162px"><div align="right">Twitter ID:</div></td>
      <td width="409" align="left"><input name="twitterid" tabindex=8 type="text" value="<?php echo "$twitterid"; ?>" />
      <font size="-2" color="red">(Please state your Twitter ID eg: @someone)</font></td>
    </tr>
    <tr>
      <td style="width: 126px"><div align="right">*Password: </div></td>
      <td align="left" style="width: 265px"><input name="password" tabindex=4 type="password" value="<?php echo "$password"; ?>" /> 
      <font size="-2" color="red">(Letters or numbers only, no spaces no symbols)</font></td>
      <td style="width: 162px"><div align="right">Facebook ID:</div></td>
      <td width="409" align="left"><input name="facebookid" tabindex=9 type="text" value="<?php echo "$facebookid"; ?>" />
      <font size="-2" color="red">(Please state your Facebook ID)</font></td>
    </tr>
    <tr>
      <td style="width: 126px"><div align="right">*Confirm Password:</div></td>
      <td align="left" style="width: 265px"><input name="cpassword" tabindex=5 type="password" value="<?php echo "$cpassword"; ?>" />
      </td>
      <td style="width: 162px"><div align="right">*Age Group: </div></td>
      <td align="left">
        <select name="youth">
        <option value="b">Adult</option>
        <option value="a">Youth</option>
      </select>
      </td>
    </tr>
    <tr>
      <td style="width: 126px"><div align="right"> </div></td>
      <td align="left" colspan="2">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td class="auto-style1" colspan="3">How many squash courts at the Francis 
	  Scaife:</td>
      <td align="left"><input name="nofscourts" tabindex=10 type="text">&nbsp;</td>
    </tr>
	<tr>
      <td class="auto-style2" colspan="4">&nbsp;(This must be answered as it stops all the 
	  robot computers trying to register)&nbsp;</td>
    </tr>
    <tr>
      <td style="width: 126px">&nbsp;</td>
      <td align="left" style="width: 265px">&nbsp;</td>
      <td class="auto-style1" style="width: 162px">&nbsp;</td>
      <td width="409" align="left">&nbsp;</td>
    </tr>   
    <tr>
      <td style="width: 126px"><div align="right"></div></td>
      <td class="auto-style2" colspan="2"><input type="submit" name="Submit" value="Submit Form" /></td>
      <td align="left">&nbsp;</td>
    </tr>
  </form>
</table>
</div>
<?php include ("footer.php")?>
</body>
</html>