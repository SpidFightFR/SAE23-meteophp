<?php
			function meteo($ville){
			global $climat;
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
			function listval($conn , $c , $e , $pn , $n, $lp){
				echo ("Historique météo: " . "<br>");				
				$R6= mysqli_query($conn, "SELECT * FROM meteo , villes WHERE meteo.idv=villes.idv
					AND meteo.date>'0000-00-00'");
				if ($R6 == null) die ("Unable to execute query: " . mysqli_error ($conn));
				$tabl=array();
				$i=1;
					$tabl[0][0]="Ville: ";
					$tabl[0][1]="Climat: ";
					$tabl[0][2]="Date: ";
				while ($row6=mysqli_fetch_assoc($R6)){
					$tabl[$i][0]=$row6['nomville'];
					$tabl[$i][1]=$row6['climat'];
						if ($row6['climat']=="couvert") $c ++;
						else if ($row6['climat']=="ensoleillé") $e++;	
						else if ($row6['climat']=="partiellement nuageux") $pn++;	
						else if ($row6['climat']=="nuageux") $n++;	
						else if ($row6['climat']=="légère pluie") $lp++;	
					$tabl[$i][2]=$row6['date'];
					$i ++;	
				}
				echo ($n . "x nuageux | " . $pn . "x partiellement nuageux | " . $e . "x ensoleillé | " . $c . "x couvert | " . $lp . "x légère pluie |" . "<br>");
				$y= $i-1;
				echo "<pre>";
				for ($z=0;$z<$i;$z++){
					for ($m=0;$m<3;$m++){
					printf("%30s", $tabl[$z][$m]);
					}
					echo "<br>";

				}
				echo "</pre>";
				
			}
?>
