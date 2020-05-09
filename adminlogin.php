<form action="" method="post">
Email: <input type="email" name="e1">
<br><br>
Password: <input type="password" name="p1">
<br><br>
<input type="submit">
</form>
<?php
if($_POST)
{
$email=$_POST['e1'];
$pass=$_POST['p1'];
mysql_connect("localhost","root","");
mysql_select_db("");
$a=mysql_query("select * from admins where email='$email' and password='$pass'");
$b=(mysql_num_rows($a));
if($b)
{
	session_start();
	$_SESSION['admin']=$email;
	header("location:adminkart.php");
}
else
{
	echo "login failed";
	?>
	<br><br>
	<?php
	echo "try again!";
}
}
?>