<!--Abhilash Gupta-->

<html>

<head>

<title>LaundrySite</title>
<script type='text/javascript' src='JS/bootstrap.min.js'></script>
<script type='text/javascript' src='JS/jquery.js'></script>
<link rel="shortcut icon" href="favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/bootstrap.min.css">
<link rel="stylesheet" href="CSS/indextemplate.css">
</head>

<body>


<div class="row maincontainer">

<div class="headingrow col-sm-4"> 

<div class="headingdiv">
	<span class="headingbig">Laundry Site</span>
</div>

<div class="mottoclass">
	<span class="mottop">Satisfying your laundry needs</span>
</div>


<div class="supportclass">
	<span class="supportp">Need Any Help?</span>
	<br/>
	<span class="numberclass">Call - </span>
	<br/>
	<span></span>
</div>


</div>

<div class="signuploginrow col-sm-8">

<form class="signuplogin row" >
<div class="signuptab signuploginhover col-sm-6" onclick="document.getElementById['changewindow'].src = 'signup.php'">
<a href="signup.php" target="changethis" class="signuploginp">Signup</a>
</div>
<div class="logintab signuploginhover col-sm-6" onclick="document.getElementById['changewindow'].src = 'login.php'">
<a href="login.php" target="changethis" class="signuploginp">Login</a>
</div>
</form>

<div class="iframediv row">
<iframe frameborder='0' src="signup.php" id="changewindow" name="changethis">
</iframe>
</div>

</div>

</div>



</body>

</html>