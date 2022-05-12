<?php
			function meteo($ville){
			global $climat;
			//$ville="montcuq";
			$meteo = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=' . $ville . ',fr&lang=fr&units=metric&APPID=20732b663eb6d3ee95e868da30aa8b43');
			$json = json_decode($meteo, true);
			$climat = $json['weather'][0]['description'];
			echo("le temps à $ville est " . $climat . "<br>");
			}
			function inserval($villeid , $climat , $today, $conn){
				$R4 = mysqli_query ($conn, "SELECT * FROM meteo WHERE meteo.date>='0000-00-00'");
				while ($row4=mysqli_fetch_assoc($R4)){
					echo "lecture des données pour la ville n°" . $villeid . "." . "<br>";
					if ($row4['date']!= null and $row4['climat']!=$climat and $row4['idv']==$villeid){
						echo ("Données quotidiennes trouvées dans la table pour la ville " . "(" . $row4['climat'] .")" . "<br>");
							$R5 = mysqli_query ($conn, "UPDATE meteo SET meteo.climat='$climat' WHERE meteo.idv='$villeid'");
							if ($R5 == null) die ("Unable to execute query: " . mysqli_error ($conn));
							else echo ("Données modifiées avec succès. " . "(" . $row4['climat'] . ")" . "<br>");
					}
					else if ($row4['date']==$today and $row4['climat']==$climat and $row4['idv']==$villeid){
						echo "Données identiques pour le climat du jour, valeurs inchangées. " . "(" . $climat . ")" . "<br>";
					}
					else{
						echo "Données absentes pour aujourd'hui, création des données...";
						$R5 = mysqli_query ($conn, "INSERT INTO meteo VALUES ('$today', '$climat' , '$villeid')");
						if ($R5 == null) die ("Unable to execute query: " . mysqli_error ($conn));
						else echo "Données créées. " . "(" . $climat . ")" . "<br>";
					}
					break;
				}
			}
?>
