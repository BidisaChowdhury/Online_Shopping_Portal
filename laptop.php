<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
nav {
    float: left;
    max-width: 220px;
    margin: 0;
    padding: 1em;
	position:fixed;
}
input:hover{
	font-weight:600;
}
nav ul {
    list-style-type: none;
    padding: 0;
	color:#0066ff;
}
   
nav ul a {
    text-decoration: none;
	padding-left:20px;
	font-size:20px;
	font-style:oblique;
}

article {
	margin-left: 220px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
}
.mySlides 
{
	display:none;
}
 div.gallery1 {
    margin:8px;
    width: 310px;
	height:340px;
	float:left;
}
div.gallery1 img {
    width: 295px;
    height:200px;
	padding:2px;
}
div.gallery1 img:hover {
    width: 305px;
	height:200px;
	overflow:hidden;
}

div.desc1 {
    padding: 5px;
    text-align: center;
	font-size:11px;
	background-color:#ffffff;
}
#Result
{
	position:absolute;
	top:50px;
}
#Result :hover
{
	font-size:22px;
}
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
</style>
<script>
function fx(str)
{
		if (str.length == 0)
		{ 
			document.getElementById("Result").innerHTML = "";
			return;
		} 
		else
		{
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() 
			{
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					document.getElementById("Result").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "search.php?q=" + str, true);
			xmlhttp.send();
		}
	
}
function fz(str)
{
		if (str.length == 0)
		{ 
			document.getElementById("Res").innerHTML = "";
			return;
		} 
		else
		{
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() 
			{
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					document.getElementById("Res").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "sort.php?q=" + str, true);
			xmlhttp.send();
		}
	
}
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
$(document).ready(function(){
    $("#hide").click(function(){
        $("#hide").hide();
    });
});
function fy(str)
{
		if (str.length == 0)
		{ 
			document.getElementById("View").innerHTML = "";
			return;
		} 
		else
		{
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() 
			{
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					document.getElementById("View").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "viewmobile.php?q=laptop", true);
			xmlhttp.send();
		}
	
}
</script>
<script>
  window.watsonAssistantChatOptions = {
    integrationID: "25557223-9018-4c1e-9724-18c6c3df2869", // The ID of this integration.
    region: "au-syd", // The region your integration is hosted in.
    serviceInstanceID: "9e0c586b-f134-4539-9adb-92f7a98fa612", // The ID of your service instance.
    onLoad: async (instance) => { await instance.render(); }
  };
  setTimeout(function(){
    const t=document.createElement('script');
    t.src="https://web-chat.global.assistant.watson.appdomain.cloud/versions/" + (window.watsonAssistantChatOptions.clientVersion || 'latest') + "/WatsonAssistantChatEntry.js";
    document.head.appendChild(t);
  });
</script>
</head>
<body>
<header style="background-color:#555;height:70px;position:fixed;width:100%">
<p style="padding-top:10px">
	<a href="index.php"><i class="glyphicon glyphicon-home" style="font-size:30px;color:#ffffff;padding-left:30px">HOME</i></a>
	<?php
		session_start();
		$cookie=0;
		if(isset($_COOKIE['user']))
		{
			$cookie=$_COOKIE['user'];
		}
		if(isset($_SESSION['id']))
		{
			$id=$_SESSION['id'];
			$con=new MySQLi("localhost","root","","project");
			$sql="select * from registration where cid=$id";
			$res=$con->query($sql);
			$row=$res->fetch_array();
			echo "<span style='padding-left:160px'><input type='text' name='n1' style='width:300px;height:30px;font-size:16px' placeholder=' What are you looking for?' onKeyUp='fx(this.value)'></span><button type='submit' style='background-color:#ffffff;height:30px;width:30px' ><i class='fa fa-search'></i></button><span style='padding-left:120px;color:#ffffff'>Welcome,".$row[1]."</span><span style='padding-left:15px;color:#ffffff'><a href='track.php'><button type='submit' style='background-color:#555;color:#ffffff'>Track Orders</button></a></span><span style='padding-left:15px'><a href='log out.php'><button type='submit' style='background-color:#555;color:#ffffff'>LOG OUT </button></a></span><a href='cartdetails.php'><i class='fa fa-shopping-cart' style='padding-left:18px;font-size:28px;color:white'> Cart(".$cookie.")</i></a>";
		}
		else
		{
			echo "<span style='padding-left:160px'><input type='text' name='n1' style='width:300px;height:30px;font-size:16px' placeholder=' What are you looking for?' onKeyUp='fx(this.value)'></span><button type='submit' style='background-color:#ffffff;height:30px;width:30px' ><i class='fa fa-search'></i></button><span style='padding-left:350px;color:#ffffff'><a href='login.php'><button type='submit' style='background-color:#555;color:#ffffff'>LOG IN </button></a></span><span style='padding-left:50px'><a href='sign up.php'><button type ='submit' style='background-color:#555;color:#ffffff'> SIGN UP </button></a></span><a href='cartdetails.php'><i class='fa fa-shopping-cart' style='padding-left:18px;font-size:28px;color:white'> Cart(".$cookie.")</i></a>";
		}
	?>
	</header><div style='padding-left:312px' id='Result'></div><br><br><br><br>
	<nav>
		<p style="padding-left:4px;background-color:#000099;color:#ffffff;font-size:28px"> Sort By Price </p>
		<div style="box-shadow: 1px 2px 2px 2px #d6d6c2;width:190px;height:100px">
		<input type='radio' name='n11' onChange='fz(this.value)' value='21'> Less than 20,000 <br>
		<input type='radio' name='n11' onChange='fz(this.value)' value='22'> Between 20,000 to 40,000 <br>
		<input type='radio' name='n11' onChange='fz(this.value)' value='23'> Greater than 40,000 <br>
		</div><br>
		<p style="padding-left:4px;background-color:#000099;color:#ffffff;font-size:28px"> Sort By RAM </p>
		<div style="box-shadow: 1px 2px 2px 2px #d6d6c2;width:190px;height:50px">
		<input type='radio' name='n11' onChange='fz(this.value)' value='111'> Within 4 GB <br>
		<input type='radio' name='n11' onChange='fz(this.value)' value='112'> More than 4 GB <br>
		</div>
	</nav>
<article>
<span style='float:right;background-color:#ffffff'><button style='background-color:#3333ff;color:#ffffff;width:105px;height:40px;font-size:15px' type='submit' value='View All' name='btn' id='hide' onClick='fy(this.value)'>VIEW ALL</button></span>
<br><br><br>
<div id="Res">
<div id="View">
<?php
	$con=new MySQLi("localhost","root","","project");
	$sql="select * from laptop where id between 1 and 9";
	$res=$con->query($sql);
	echo "<ul style='list-style-type:none;padding-left:45px'>";
	while($row=$res->fetch_array())
	{
		echo "<li><div class='gallery1'><a href='laptopspecification.php?id=$row[0]'><img src='".$row[3]."'><div class='desc1'><p style='font-weight:900;font-size:14px'>".$row[1]."</p><p style='color:#006600;font-weight:600;font-size:12px'><strike>&#8377;".$row[18]."</strike></p><p style='font-weight:600;font-size:12px;color:#5c8a8a'>NOW &#8377;" .$row[19]."</p></div></a></div></li>";
    }
	echo "</ul>";
?>
</div>
</div>
</article>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
</body>
</html>                          