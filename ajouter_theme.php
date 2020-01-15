<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" href="styles.css">
</head>


<body>
	<h3>Nouveau thème</h3>


	<?php
	
	$reactivation = $_POST["reactivation"];
	

	date_default_timezone_set('Europe/Paris');
	$date = date("Y-m-d");
	
	$dbhost = 'tuxa.sme.utc';
	$dbuser = 'nf92a079'; 
	$dbpass = 'gFoR4Pl9'; 
	$dbname = 'nf92a079';
    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');


	//Premier passage : $reactivation vaut 0 donc le 'if' s'exécute
	if(!$reactivation){	

		$nom = $_POST["nom"];
		$descriptif = $_POST["descriptif"];
		$nom = mysqli_real_escape_string($connect, $nom );
		$descriptif = mysqli_real_escape_string($connect,$descriptif);
		echo "<table>";
		echo "<tr><th colspan=2><b>Informations saisies :</b> </th></tr>";
		echo "<tr><td>Nom : </td><td> $nom </td></tr>";
		echo "<tr><td>Descriptif : </td><td> $descriptif </td></tr>";
		echo "</table>";	
		
		$query = "SELECT * FROM `themes` WHERE nom='$nom'";
		//echo "<br>$query<br>";
		$result  =  mysqli_query($connect,  $query);
		if (!$result) { echo "<br>pas bon ".mysqli_error($connect);}

		// Vérification de l'existennce d'un thème similaire
		if(mysqli_num_rows($result) > 0){
			$row=mysqli_fetch_array($result);

			echo "<b>Ce thème existe déjà avec le descriptif suivant :</b><br><br>";
			echo $row[3];
			echo "<br><br><b>Voulez vous le réactiver ?</b><br>";
			echo "<div style='height : 10%'></div>";
			echo "<FORM METHOD=POST ACTION='ajouter_theme.php'>";
			echo "<INPUT type='hidden' NAME='idtheme' VALUE=".$row[0].">";
			echo "<input type='hidden' name='reactivation' value=1>";
			echo "<INPUT class='valider' VALUE='Réactiver' TYPE='SUBMIT'><br>";
			// Bouton annuler
			echo "</form>";
			echo "<form method='post' action='ajout_theme.html'>";
			echo "<input class='annuler' type='submit' value='Annuler'>";
			echo "</form>";
			}
		// Ajout du nouveau thème
		else{
			$query  =  "insert  into  themes  values  (NULL, '$nom' ,  0 , '$descriptif')";
			//echo "<br>$query<br>";
			$result  =  mysqli_query($connect,  $query);
			if (!$result) { echo "<br>pas bon ".mysqli_error($connect);}
			echo "<b>Le thème a bien été ajouté !</b>";
		}
	}
	// Si $reactivation vaut 1 : le thème existe déjà et on le réactive
	else{
		$idtheme = $_POST["idtheme"];
		$query = "UPDATE themes SET supprime=0 where idtheme=$idtheme";
		//echo "<br>$query<br>";
		$result  =  mysqli_query($connect,  $query);
		if (!$result) { echo "<br>pas bon ".mysqli_error($connect);}
		echo "<b>Le thème a bien été réactivé !</b>";
	}

	mysqli_close($connect);

	?>
</body>


</html>