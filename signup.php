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

<form action="" method="post">
	
	<div class="formdata row" id="formdatatop">
		<input class="inputformdata" placeholder="Name" type="text" name="n1" required>
	</div>	

	<div class="formdata row">
		<input class="inputformdata" placeholder="Room Number" type="number" name="r1" min="1" required>
	</div>

	
	<div class="formdata row">
		<input class="inputformdata" placeholder="Mobile Number" type="number" name="m1" required>
	</div>
	
	
	<div class="formdata row">
		<input class="inputformdata" placeholder="Email ID" type="email" name="e1" required>
	</div>

	
	<div class="formdata row">
		<input class="inputformdata" placeholder="Password" type="password" name="p1" required >
	</div>
		

	
	<div class="formdata row">
		<div class="inputformdatasignup">
			<span class="formp">Hostel:</span> 
					<br/>
					<input type="radio" value="Boys B Block" name="h1" required><span class="formp">Boys B Block</span>
					<br/>
					<input type="radio" value="Boys A Block" name="h1" required><span class="formp">Boys A Block</span> 
					<br/>
					<input type="radio" value="Girls B Block" name="h1" required><span class="formp">Girls B Block</span>
		</div>
	</div>	


	<input class="submitdata" value="Sign Up" type="submit">

</form>
</div>


</body>
</html>

<?php
if($_POST)
{
$name = mysql_escape_string($_POST['n1']);
$email = mysql_escape_string($_POST['e1']);
$password = mysql_escape_string($_POST['p1']);
$hostel = mysql_escape_string($_POST['h1']); 
$room_number = mysql_escape_string($_POST['r1']); 
$mobile_number = mysql_escape_string($_POST['m1']);
mysql_connect("localhost","root","");
mysql_select_db("");
$password = md5($password); 
$user_check=mysql_query("select * from users where email='$email' ");
$user_check1=mysql_query("select * from users where mobileno='$mobile_number' ");

if((mysql_num_rows($user_check)>=1)||(mysql_num_rows($user_check1)>=1))
   {
    echo "email already already exists. please take another one. ";
   }
 else
    {
mysql_query("insert into users values('','$name','$email','$password','$room_number','$mobile_number','$hostel')");
header("location:login.php");

    }
}
?>