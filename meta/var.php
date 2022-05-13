<?php
	$name=$_POST['nom'];
	$ip="localhost";
	//$ip="rt-projet.pu-pm.univ-fcomte.fr";
	//$ip="127.0.0.2";
	$user="jbettig";
	$dbname="jbettig_01";
	$pass="Benlechien";
	$conn = mysqli_connect($ip, $user, $pass, $dbname );
	$ville=$json=$climat=$ville2=$villeid2="test";
	$today=date("Y-m-d");
	$c=0;
	$pn=0;
	$n=0;
	$e=0;
	$lp=0;
?>
