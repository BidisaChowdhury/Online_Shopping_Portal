<?php
$cookie_name="user";
$c=0;
if(isset($_COOKIE[$cookie_name]))
{
	$c=$_COOKIE[$cookie_name]+1;
	setcookie($cookie_name,$c,time()+(200));
}	

else
{
	$bu=rand(1,9999);
	setcookie('browser',$bu,time()+(200));
	$c=1;
	setcookie($cookie_name,$c,time()+(200));
}
	$model=$_GET['model'];
	echo "<script>window.location.href='addcartaction.php?model=$model'</script>";
?>