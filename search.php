<style type="text/css">
 table1 {
	  color:#000000;
	  font-weight:900;
	  width:700px;
	  height:100px;
}
tr
{
	background-color: #ffffff;
}
td :hover
{
	text-decoration:underline;
	color:#0033cc;
	font-style:italic;
	font-weight:500;
	font-size:16px;
}

td{
	padding:5px;
	color:#000000;
}
</style>
<?php
$mb=$_GET['q'];
$con=new MySQLi("localhost","root","","project");
$sql="select * from mobile where modelname like '$mb%'";
$res=$con->query($sql);
echo "<table class='table1'>";
		  while($rows = $res->fetch_array())
          {
			   echo "<tr>";
			   echo "<td><a href='mobilespecification.php?id=$rows[0]'>".$rows[2]."</td>";
			   echo "</tr>";
		 }
  $sql1="select * from laptop where modelname like '$mb%'";
$res1=$con->query($sql1);
		  while($rows = $res1->fetch_array())
          {
			   echo "<tr>";
			   echo "<td><a href='laptopspecification.php?id=$rows[0]'>".$rows[1]."</td>";
			   echo "</tr>";
		 }
$sql2="select * from tablets where modelname like '$mb%'";
$res2=$con->query($sql2);
		  while($rows = $res2->fetch_array())
          {
			   echo "<tr>";
			   echo "<td><a href='tabletsspecification.php?id=$rows[0]'>".$rows[2]."</td>";
			   echo "</tr>";
		 }
			  echo "</table>";
 ?>