<?php
session_start();
if (!isset($_SESSION['id']))
{
	header("location: mnotloggedin.php");
	exit();
}
// Place Session variable 'id' into local variable
$id = $_SESSION['id'];
// Process the form if it is submitted
if ($_FILES['uploadedfile']['tmp_name'] != "") 
{
    // Run error handling on the file
    // Set Max file size limit to somewhere around 120kb
    $maxfilesize = 120000;
    // Check file size, if too large exit and tell them why
    if($_FILES['uploadedfile']['size'] > $maxfilesize ) 
    { 
        echo "<br /><br />Your image was too large. Must be 100kb or less, please<br /><br />
        <a href=\"medit_pic.php\">click here</a> to try again";
        unlink($_FILES['uploadedfile']['tmp_name']); 
        exit();
    // Check file extension to see if it is .jpg or .gif, if not exit and tell them why
    } 
    else if (!preg_match("/\.(gif|jpg)$/i", $_FILES['uploadedfile']['name'] ) )
    {
        echo "<br /><br />Your image was not .gif or .jpg and it must be one of those two formats, please<br />
        <a href=\"medit_pic.php\">click here</a> to try again";
        unlink($_FILES['uploadedfile']['tmp_name']);
        exit();
        // If no errors on the file process it and upload to server 
    }
    else
    { 
        // Rename the pic
        $testpsfile="c:\\wamp\\www\\testps\\memberfiles\\".$id;
        $pifile = "/var/www/testps/memberfiles/".$id;
        $file = $testpsfile;
        if (!file_exists($file))
        {
          mkdir($file);
        }
        $testpsfile="c:\\wamp\\www\\testps\\memberfiles\\".$id."\\pic1.jpg"; 
        $pifile = "/var/www/testps/memberfiles/".$id."/pic1.jpg";
        $file = $testpsfile;
        
        if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $file))
        {
			header("location: mmember_profile.php");
            exit();
        }
        else
        {
            echo "There was an error uploading the file, please try again. If it continually fails, contact us by email. <br /><br />
            <a href=\"mmember_profile.php\">Click here</a> to return to your profile edit area";
            exit();
        }
    } // close else after file error checks
} // close if post the form
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes"/>
<title>Change Picture</title>
<link rel="stylesheet" type="text/css" href="psmain_m.css" />
<script type="text/javascript">
<!-- Form Validation -->
function validate_form ( ) { 
valid = true; 
if ( document.form.uploadedfile.value == "" ) { 
alert ( "Please browse for a file on your device and place it" ); 
valid = false;
}
return valid;
}
<!-- Form Validation -->
</script>
</head>
<body>
<?php 
include ("mheaderbanner.php")
?>
<div class="body row scroll-y" align="center" id="MainBody" >
     <div align="center">
       <h3><br />
         <br />
       Upload or replace your profile image here <br />  
       <br />
       </h3>
     </div>
     <table border="2" align="center" cellpadding="5" cellspacing="5">
      <form action="medit_pic.php" method="post" enctype="multipart/form-data" name="form" id="form" onsubmit="return validate_form ( );">
         <tr>
           <td colspan="2"><img src="../memberfiles/<?php echo "$id"; ?>/pic1.jpg" alt="Ad" width="150" /></td>
         </tr>
		 <tr>
           <td colspan="2"><input name="uploadedfile" type="file" /></td>
         </tr>
         <tr>
           <td colspan="2"><div align="center">
             <input type="submit" name="Submit" value="Upload Image" />
           </div></td>
         </tr>
       </form>
</table>
</div>
<?php 
include ("mfooter.php")
?>
</body>
</html>