<!--Abhilash Gupta-->

<html>

<head>

<title>Login</title>
<script type='text/javascript' src='JS/bootstrap.min.js'></script>
<script type='text/javascript' src='JS/jquery.js'></script>
<link rel="shortcut icon" href="favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/bootstrap.min.css">
<link rel="stylesheet" href="CSS/loginsignuptemplate.css">
</head>
<body>



<div class="loginform container">
	<form id="mainform" action="" method="post">
		
		<div class="formdata row" id="formdatatop">
			<input type="number" name="m1" placeholder="Mobile Number" class="inputformdatalogin" required>
		</div>
		<div class="formdata row">
			<input class="inputformdatalogin" placeholder="Password" type="password" name="p1" required>
		</div>
		<br/>
		<input class="submitdata" value="Log In" type="submit">
</form>
</div>


</body>
</html>

<?php
if($_POST)
{
$mobile_number = mysql_escape_string($_POST['m1']);
$password = mysql_escape_string($_POST['p1']);
mysql_connect("localhost","root","");
mysql_select_db("");
$password = md5($password); 
$a=mysql_query("select * from users where mobileno='$mobile_number' and password='$password' ");
if(mysql_num_rows($a))
{
	session_start();
	$_SESSION['mobileno']=$mobile_number;
	?>
	<script>
	var win = window.open('bucket.php', '_parent');
	
	</script>
	<?php
	
}
else
{
	echo "<p class='errorclass'>Invalid Attempt</p>";
}
}
?>