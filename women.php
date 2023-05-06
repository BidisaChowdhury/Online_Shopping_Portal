<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
nav {
    float: left;
    max-width: 220px;
    margin: 0;
    padding: 1em;
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
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
}
.mySlides 
{
	display:none;
}
 div.gallery1 {
    margin: 5px;
    float:left;
    width: 250px;
	height:500px;
}
div.gallery2 {
    margin: 5px;
    float:left;
    width: 220px;
	height:400px;
}
div.gallery1 img {
    width: 235px;
    height:360px;
	padding-left:58px;
}
div.gallery2 img {
    width: 190px;
    height:300px;
	padding-left:58px;
}

div.gallery1 img:hover {
    width: 245px;
	height:360px;
	overflow:hidden;
}
div.gallery2 img:hover {
    width: 200px;
	height:300px;
	overflow:hidden;
}

div.desc1 {
    padding: 15px;
    text-align: center;
	font-size:11px;
	background-color:#ffffff;
}
#result
{
	position:absolute;
	top:50px;
}
#result :hover
{
	font-size:22px;
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

</script>
</head>
<body>
<header style="background-color:#555;height:70px">
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
	?>	</header><div style='padding-left:312px' id='Result'></div><br>
	<nav>
		<p style="padding-left:4px;background-color:#000099;color:#ffffff;font-size:20px"> Sort Watches By Price </p>
		<input type='radio' name='n11' onChange='fz(this.value)' value='81'> Less than 1,000 <br>
		<input type='radio' name='n11' onChange='fz(this.value)' value='82'> Between 1,000 to 2,000 <br>
		<input type='radio' name='n11' onChange='fz(this.value)' value='83'> More than 2,000 <br>
	</nav>
<article>
<div id="Res">
<?php
	$con=new MySQLi("localhost","root","","project");
	$sql="select * from wear where gender='F'";
	$res=$con->query($sql);
	echo "<ul style='list-style-type:none;padding-left:15px'>";
	while($row=$res->fetch_array())
	{
		echo "<li><div class='gallery1'><a href='wearspecification.php?id=$row[0]'><img src='".$row[3]."'><div class='desc1'><p style='font-weight:900;font-size:14px'>".$row[2]."</p><p style='color:#006600;font-weight:600;font-size:12px'><strike>&#8377;".$row[8]."</strike></p><p style='font-weight:600;font-size:12px;color:#5c8a8a'>NOW &#8377;" .$row[9]."</p></div></a></div></li>";
    }
	echo "</ul>";
	$sql="select * from watches where gender='F' order by offerprice";
	$res=$con->query($sql);
	echo "<ul style='list-style-type:none;padding-left:15px'>";
	while($row=$res->fetch_array())
	{
		echo "<li><div class='gallery2'><a href='watchesspecification.php?id=$row[0]'><img src='".$row[4]."'><div class='desc1'><p style='font-weight:900;font-size:14px'>".$row[2]."</p><p style='color:#006600;font-weight:600;font-size:12px'><strike>&#8377 ".$row[8]."</strike></p><p style='font-weight:600;font-size:12px;color:#5c8a8a'>NOW &#8377;" .$row[9]."</p></div></a></div></li>";
    }
	echo "</ul>";
?>
</div>
</article>
</body>
</html>                          
