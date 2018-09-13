<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-gb" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link rel="stylesheet" type="text/css" href="CSS/psmain.css" />
<title>PockSquash - Submit Match</title>
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
			echo "<p>Please note this page is currently under construction, it is <b>not</b> currently possible to submit any results!</p>";
			echo "<p>Hi " . $_SESSION['firstname'] . ", submit the result of your mini-league match below.</p>";
			echo "<p><b>" . $_SESSION['firstname'] . " " . $_SESSION['surname'] . "</b> played <select name='youth'>
        														<option value='pers1'>Other person 1</option>
        														<option value='pers2'>Other person 2</option>
        														<option value='pers3'>Other person 3</option>
        														<option value='pers4'>Other person 4</option>
      														</select>
														<p>";
			echo "<p><b>" . $_SESSION['firstname'] . "</b> scored <input name='submitplayer' style='width: 30px;' tabindex=1 type='text' value=''/> point(s).</p>";
			echo "<p><b>Other player 1</b> scored <input name='submitplayer' style='width: 30px;' tabindex=1 type='text' value=''/> point(s).</p>";
			echo "<input type='submit' name='Submit' value='Submit Match' />";
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
