<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Résultat forum</title>
    </head>
    <body>
				<?php
					include "./meta/var.php";
					include "./meta/fonct.php";
					echo ("nom de l'élève: " . $name . "<br>");
					if (!$conn){
						echo "connection failed: " . mysqli_connect_error();
					}
					else{
						print("Connection successful") . "<br>";
					}
					$R1=mysqli_query($conn, "SELECT * FROM groupe, etudiants, villes
						WHERE etudiants.id>='1'
						AND etudiants.noms='$name'
						AND groupe.idg=etudiants.idg 
						AND etudiants.idv1=villes.idv");
					if ($R1 == null) die ("Unable to execute query: " . mysqli_error ($conn));
					while ($row=mysqli_fetch_assoc($R1)){
						echo ("Bonjour, " . $row['noms'] . " " . $row['prenoms'] . "<br>" . "Vous êtes dans le groupe: " . $row['ngroup'] . "<br>");
						echo ("Vote résidence primaire est située à: " . $row['nomville'] . "<br>");
						echo ("La date d'aujourd'hui est: " . $today . "<br>");
						$ville=$row['nomville'];
						$villeid=$row['idv'];
						if ($row['idv2'] != null) 
							$R2=mysqli_query($conn, "SELECT * FROM etudiants, villes
							WHERE etudiants.noms='$name'
							AND etudiants.idv2=villes.idv");
							while ($row2=mysqli_fetch_assoc($R2)){ 
								echo ("Votre résidence secondaire est située à: " . $row2['nomville'] . "<br>");
								$ville2=$row2['nomville'];
								$villeid2=$row2['idv'];
							}
					}
					meteo($ville);	
					inserval($villeid , $climat , $today , $conn);
					if ($ville2!= "test"){
						$ville=$ville2;
						$villeid=$villeid2;
						meteo($ville);	
						inserval($villeid , $climat , $today , $conn);
					}
				echo "<br>" . "<br>";
					listval($conn, $c , $e , $pn , $n, $lp);
				?>
        <br>
        <p>
        <a href="form.html"><button>Revenir à la page du forum</button></a>
        </p>
    </body>
</html>
