<?php
	include "var.php";
function meteo($ville, $json, $climat){
			//$ville="montcuq";
			$meteo = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=' . $ville . ',fr&lang=fr&units=metric&APPID=20732b663eb6d3ee95e868da30aa8b43');
			$json = json_decode($meteo, true);
			$climat = $json['weather'][0]['description'];
			echo("le temps à $ville est " . $climat . "<br>");
	}
?>
