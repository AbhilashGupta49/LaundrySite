<?php
session_start();
$mobile_number=$_SESSION['mobileno'];
if($mobile_number)
{
session_destroy();
echo 'You have logged out';
 
  header( "refresh:5; url=index.php" ); 



}
else
'There is no active session to logout';
?>