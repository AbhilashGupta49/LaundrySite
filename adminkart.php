<form action="" method="post">
Please enter the date of order:<input type="date" name="d1">
	<input type="submit">
</form>
<?php
if($_POST)
	{
session_start();
$email=$_SESSION['admin'];
if($email)
{
	$date=mysql_escape_string($_POST['d1']);
	echo "$date";
	mysql_connect("localhost","root","");
	mysql_select_db("");
$fenil=	mysql_query("select * from kart where date='$date' ");
while($row = mysql_fetch_assoc($fenil))
{
$a=$row["mobileno"];
echo $row["mobileno"];
echo "<br>";
echo $row["shirt"];
echo "<br>";
echo $row["pant"];
echo "<br>";
echo $row["jeans"];
echo "<br>";
echo $row["tshirt"];
echo "<br>";
echo $row["short"];
echo "<br>";
echo $row["bedsheet"];
echo "<br>";
echo $row["blanket"];
echo "<br>";
echo $row["capri"];
echo "<br>";
echo $row["handkerchief"];
echo "<br>";
echo $row["pillowcover"];
echo "<br>";
echo $row["towel"];
echo "<br>";
echo $row["price"];
echo "<br>";
echo $row["date"];
echo "<br>";		
echo "<br>";		
echo "<br>";		
echo "<br>";		
echo "<br>";		
$row-- ;
}
}}
	?>
