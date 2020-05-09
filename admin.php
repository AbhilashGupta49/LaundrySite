<form action="" method="post">
Name:
<input type="text" name='n1' required>
<br><br>
Email:
<input type="email" name='e1' required>
<br><br>
Password:
<input type="password" name='p1' required>
<br><br>
Mobile Number:
<input type="number" name="m1" required>
<input type="submit">
</form>
<?php
if($_POST)
{
	$name=$_POST['n1'];
	$email=$_POST['e1'];
	$password=$_POST['p1'];
	$mob_no=$_POST['m1'];
	mysql_connect("localhost","root","");
	mysql_select_db("karan");
	$a=mysql_query("insert into admins values('','$name','$email','$password','$mob_no')");
	if($a)
	{
	header("location:adminlogin.php");
	}
}
?>