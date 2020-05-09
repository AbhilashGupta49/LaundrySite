<!--Abhilash Gupta-->


<?php


$costofshirt=5;
$costofpant=5;
$costofjeans=5;
$costoftshirt=5;
$costofshort=5;
$costofbedsheet=5;
$costofblanket=5;
$costofcapri=5;
$costofhandkerchief=5;
$costofpillowcover=5;
$costoftowel=5;

if($_POST)
{
	
	

session_start();
$mobile_number=$_SESSION['mobileno'];



if($mobile_number)
{

if($shirt<0 ||$pant<0 ||$jeans<0 ||$tshirt<0 ||$short<0 ||$bedsheet<0 ||$blanket<0 ||$capri<0 ||$handkerchief<0 ||$pillowcover<0 ||$towel<0)
{ header( "refresh:5; url=bucket.php" );}

$shirt = $_POST['shirt'];
$pant = $_POST['pant'];
$jeans = $_POST['jeans'];
$tshirt = $_POST['tshirt'];
$short = $_POST['short'];
$bedsheet = $_POST['bedsheet'];
$blanket = $_POST['blanket'];
$capri = $_POST['capri'];
$handkerchief = $_POST['handkerchief'];
$pillowcover = $_POST['pillowcover'];
$towel = $_POST['towel'];

$shirtp=$costofshirt*$shirt;
$pantp=$costofpant*$pant;
$jeansp=$costofjeans*$jeans;
$tshirtp=$costoftshirt*$tshirt;
$shortp=$costofshort*$short;
$bedsheetp=$costofbedsheet*$bedsheet;
$blanketp=$costofblanket*$blanket;
$caprip=$costofcapri*$capri;
$handkerchiefp=$costofhandkerchief*$handkerchief;
$pillowcoverp=$costofpillowcover*$pillowcover;
$towelp=$costoftowel*$towel;


mysql_connect("localhost","root","");
mysql_select_db("");
$price=$shirtp+$pantp+$jeansp+$tshirtp+$shortp+$bedsheetp+$blanketp+$caprip+$handkerchiefp+$pillowcoverp+$towelp;
date_default_timezone_set('Asia/Calcutta');
$today = date("Y-m-d");
echo "$today";
//$date=date("m/d/Y");
mysql_query("insert into kart values('','$mobile_number','$shirt','$pant','$jeans','$tshirt','$short','$bedsheet','$blanket','$capri','$handkerchief','$pillowcover','$towel','$price','$today')");
echo "Your order has been submitted and your price is $price";

}
else
echo 'Please refresh the page and login.';
}
?>


<html>

<head>

<title>LaundryWala</title>
<script type='text/javascript' src='JS/bootstrap.min.js'></script>
<script type='text/javascript' src='JS/jquery.js'></script>
<link rel="shortcut icon" href="favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/bootstrap.min.css">
<link rel="stylesheet" href="CSS/buckettemplate.css">
</head>

<body onload="jsfunc()">
<script>

var activeitem=0;
var totalquantity=0;
var totalbill=0;
var inventory=[0,0,0,0,0,0,0,0,0,0,0];
var bucketitems=['Shirt','Pant','Jeans','T-Shirt','Short','Bedsheet','Blanket','Capri','Handkerchief','Pillow Cover','Towel'];
var bucketitemscost=[<?php echo json_encode($costofshirt); ?>,<?php echo json_encode($costofpant); ?>,<?php echo json_encode($costofjeans); ?>,<?php echo json_encode($costoftshirt); ?>,<?php echo json_encode($costofshort); ?>,<?php echo json_encode($costofbedsheet); ?>,<?php echo json_encode($costofblanket); ?>,<?php echo json_encode($costofcapri); ?>,<?php echo json_encode($costofhandkerchief); ?>,<?php echo json_encode($costofpillowcover); ?>,<?php echo json_encode($costoftowel); ?>];
function jsfunc()
{

var noofitems=bucketitems.length;

document.getElementsByClassName("centerheading")[0].innerHTML=bucketitems[0];
document.getElementsByClassName("centercost")[0].innerHTML=bucketitemscost[0];

for(i=0;i<noofitems;i++)
{
document.getElementsByClassName("bucketitemsp")[i].innerHTML=bucketitems[i];
document.getElementsByClassName("bucketitemscost")[i].innerHTML=bucketitemscost[i];
}

}


function clickbucketitem(thispointer)
{
    document.getElementsByClassName("centerheading")[0].innerHTML=thispointer.getElementsByTagName("span")[0].innerHTML;
	document.getElementsByClassName("centercost")[0].innerHTML=thispointer.getElementsByTagName("span")[1].innerHTML;
	var savei=0;
	for(i=0;i<bucketitems.length;i++)
	{
		if(thispointer.getElementsByTagName("span")[0].innerHTML==bucketitems[i])
			savei=i;
	}
	
	activeitem=savei;
	document.getElementsByClassName('centerquantity')[0].value=inventory[activeitem];
	
}


function clickaddorsubtract(thispointer)
{
	if(thispointer.className=='centersubtractdiv')
	{	
		if(inventory[activeitem]>0)
		{
			inventory[activeitem]-= 1;
			totalquantity-=1;
			totalbill-=bucketitemscost[activeitem];
		}
	}	
	else
	{	
		inventory[activeitem] += 1;
		totalquantity+=1;
		totalbill+=bucketitemscost[activeitem];
	}
	document.getElementsByClassName('centerquantity')[0].value=inventory[activeitem];
	
	document.getElementsByClassName("totalbillcenter")[0].innerHTML=totalbill;
	updatelaundrybag();
}


function updatelaundrybag()
{
	while (document.getElementById("addelements").firstChild)
	{
		document.getElementById("addelements").removeChild(document.getElementById("addelements").firstChild);
	}
	
	for(i=0;i<bucketitems.length;i++)
	{
		if(inventory[i]>0)
		{
			var newbucketitemdiv=document.createElement('div');
			newbucketitemdiv.className='bagitems';
			
			document.getElementById('addelements').appendChild(newbucketitemdiv);
			
			var newbucketitempdiv=document.createElement('div');
			newbucketitempdiv.className='bagitemspdiv';
			newbucketitemdiv.appendChild(newbucketitempdiv);
			
			var newbucketitemp=document.createElement('span');
			newbucketitemp.className='bagitemsp';
			newbucketitemp.innerHTML=bucketitems[i];
			newbucketitempdiv.appendChild(newbucketitemp);
		
			var newbucketitemqdiv=document.createElement('div');
			newbucketitemqdiv.className='bagitemsqdiv';
			newbucketitemdiv.appendChild(newbucketitemqdiv);
			
			var newbucketitemq=document.createElement('span');
			newbucketitemq.className='bagitemsq';
			newbucketitemq.innerHTML=inventory[i];
			newbucketitemqdiv.appendChild(newbucketitemq);
			
			var newbucketitemcdiv=document.createElement('div');
			newbucketitemcdiv.className='bagitemscdiv';
			newbucketitemdiv.appendChild(newbucketitemcdiv);
			
			var newbucketitemc=document.createElement('span');
			newbucketitemc.className='bagitemsc';
			newbucketitemc.innerHTML=bucketitemscost[i]*inventory[i];
			newbucketitemcdiv.appendChild(newbucketitemc);
		}
	}
	
	document.getElementsByClassName("totalbillrightp")[0].innerHTML=totalbill;
	document.getElementsByClassName("totalbillrightq")[0].innerHTML=totalquantity;
}


function submitbill()
{
	$.ajax({
	type: 'POST',
	url:"bucket.php", 
	data:
	{
		'shirt': inventory[0], 'pant': inventory[1],'jeans': inventory[2],'tshirt': inventory[3],'short': inventory[4],'bedsheet': inventory[5],'blanket': inventory[6],'capri': inventory[7],'handkerchief': inventory[8],'pillowcover': inventory[9],'towel': inventory[10]
	} 
})
}
</script>


<div class="headerbucket">
<span class="headingbig">The Bucket List</span>
<a class="logoutp" href="logout.php">Logout</a>
</div>

<div class="mainbody container">
	<div class="leftside">
		<div class="bucketitemsdiv" onclick="clickbucketitem(this)" id="shirtdiv">
			<span class="bucketitemsp"></span>
			<br/>
			<span class="bucketitemscost"></span>
		</div>
		
		<div class="bucketitemsdiv" onclick="clickbucketitem(this)" id="pantdiv">
			<span class="bucketitemsp"></span>
			<br/>
			<span class="bucketitemscost"></span>
		</div>

		<div class="bucketitemsdiv" onclick="clickbucketitem(this)" id="jeansdiv">
			<span class="bucketitemsp"></span>
			<br/>
			<span class="bucketitemscost"></span>
		</div>
		
		<div class="bucketitemsdiv" onclick="clickbucketitem(this)" id="tshirtdiv">
			<span class="bucketitemsp"></span>
			<br/>
			<span class="bucketitemscost"></span>
		</div>
		
		<div class="bucketitemsdiv" onclick="clickbucketitem(this)" id="shortdiv" >
			<span class="bucketitemsp"></span>
			<br/>
			<span class="bucketitemscost"></span>
		</div>
		
		<div class="bucketitemsdiv" onclick="clickbucketitem(this)" id="bedsheetdiv">
			<span class="bucketitemsp"></span>
			<br/>
			<span class="bucketitemscost"></span>
		</div>
		
		<div class="bucketitemsdiv" onclick="clickbucketitem(this)" id="blanketdiv">
			<span class="bucketitemsp"></span>
			<br/>
			<span class="bucketitemscost"></span>
		</div>
		
		<div class="bucketitemsdiv" onclick="clickbucketitem(this)" id="capridiv">
			<span class="bucketitemsp"></span>
			<br/>
			<span class="bucketitemscost"></span>
		</div>
		
		<div class="bucketitemsdiv" onclick="clickbucketitem(this)" id="handkerchiefdiv">
			<span class="bucketitemsp"></span>
			<br/>
			<span class="bucketitemscost"></span>
		</div>
		
		<div class="bucketitemsdiv" onclick="clickbucketitem(this)" id="pillowcoverdiv">
			<span class="bucketitemsp"></span>
			<br/>
			<span class="bucketitemscost"></span>
		</div>
		
		<div class="bucketitemsdiv" onclick="clickbucketitem(this)" id="toweldiv">
			<span class="bucketitemsp"></span>
			<br/>
			<span class="bucketitemscost"></span>
		</div>
	</div>


	<div class="centerside">
		<p class="centerheading"></p>
		<p class="centercost"></p>
		<br/>
		<br/>
		<br/>
			<div class="centerchangediv">
				<div class="centersubtractdiv" onclick="clickaddorsubtract(this)"><span class="centersubtract">-</span></div>
				<div class="centerquantitydiv">
					<input class="centerquantity" value='0' disabled />&nbsp;
				</div>
				<div class="centeradddiv" onclick="clickaddorsubtract(this)"><span class="centeradd">+</span></div>
			</div>
		<br/>
		<br/>
		<br/>
		<div class="totalbillcenterdiv">
			<span class="totalbillcenterp">Total Bill : </span>
			<span class="totalbillcenter">0</span>
		</div>
		<div class="submitbuttondiv">
			<span class="submitbuttonp" onclick="submitbill()">SUBMIT</span>
		</div>
	</div>


	<div class="rightside">
		<p class="laundrybagp">Laundry Bag</p>
		<div class="itemtablediv">
			<div class="itemtableitem">
				<span class="itemtableitemp">Item</span>
			</div>
			<div class="itemtablequantity">
				<span class="itemtablequantityp">Quantity</span>
			</div>
			<div class="itemtablecost">
				<span class="itemtablecostp">Cost</span>
			</div>
		</div>
		<hr class="horizontalrow" />
		<div id="addelements">
		</div>
		<hr class="horizontalrow" />
		<div class="totalbillrightdiv">
			<div class="totalbillrightqdiv">
				<span class="totalbillrightq">0</span>
			</div>
			<div class="totalbillrightpdiv">
				<span class="totalbillrightp">0</span>
			</div>
		</div>
	</div>

</div>




</body>

</html>
