<?php
	$name=$_POST['nom'];
	$ip="localhost";
	//$ip={ip or domain of the Database};
	$user="{usernameDB}";
	$dbname="{DBname}";
	$pass="{passwordDB}";
	$conn = mysqli_connect($ip, $user, $pass, $dbname );
	$ville=$json=$climat=$ville2=$villeid2="test";
	$today=date("Y-m-d");
	$c=0;
	$pn=0;
	$n=0;
	$e=0;
	$lp=0;
?>
