<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" href="styles.css">
	<meta Cache-Control: no-cache, no-store, must-revalidate/>
</head>


<body>
	<h3>Ajout d'un élève</h3>


	<?php	
		date_default_timezone_set('Europe/Paris');
		$date = date("Y-m-d");
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92a079'; 
		$dbpass = 'gFoR4Pl9';
		$dbname = 'nf92a079';
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');


		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$ddn= $_POST["ddn"];
		$nom = ucwords((strtolower(mysqli_real_escape_string ($connect, $nom ))), "\t\r\n\f\v - _ ' ");
		$prenom = ucwords((strtolower(mysqli_real_escape_string ($connect, $prenom ))), "\t\r\n\f\v - _ ' ");
	?>

	
	<br>
	<table>
		<tr><th colspan=2><b>Informations saisies :</b></th></tr>		
		<tr><td>Nom : </td><td> <?php echo "$nom"; ?> </td></tr>
		<tr><td>Prenom : </td><td> <?php echo "$prenom"; ?> </td></tr>
		<tr><td>Date de naissance : </td><td> <?php echo "$ddn"; ?> </td></tr>
	</table>

	<?php
		$query = "SELECT * FROM eleves WHERE nom='$nom' and prenom='$prenom' and dateNaiss='$ddn'";
		//echo "<br>$query<br>";
		$result  =  mysqli_query($connect,  $query);
		 if(!$result){die('Requêteinvalide:'.mysqli_error($connect));}
		
		//si l'élève existe déjà $result possède plus de zéro ligne
		if(mysqli_num_rows($result) > 0){
			echo "<br><b>Un(e) élève de même nom, prénom et date de naissance existe déjà, voiçi ses informations :</b><br>";
			while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				echo $row[1]." ".$row[2]." né(e) le ".$row[3]." inscrit le ".$row[4]."<br>";
			}
			echo "<div style='height : 10%'></div>";
			echo "<FORM METHOD=POST ACTION='valider_eleve.php'>";
			echo "<INPUT type='hidden' NAME='nom' VALUE=".$nom.">";
			echo "<INPUT type='hidden' NAME='prenom' VALUE=".$prenom.">";
			echo "<INPUT type='hidden' NAME='ddn' VALUE=".$ddn.">";
			echo "<INPUT class='valider' VALUE='Je valide ce nouvel élève' TYPE='SUBMIT'><br>";
			
			echo "</form>";
			echo "<form method='post' action='ajout_eleve.php'>";
			echo "<input class='annuler' type='submit' value='Annuler'>";
			echo "</form>";

		}
		else{
			$query  =  "INSERT  into  eleves  values  (NULL, '$nom' ,  '$prenom' , "."'$ddn'"."  ,"."'$date'".")";
			//echo "<br>$query<br>";
			$result  =  mysqli_query($connect,  $query);
			if (!$result) { echo "<br>pas bon ".mysqli_error($connect);}
			echo "<b>l'élève a bien été ajouté !</b>";
		}

		mysqli_close($connect);


	?>
</body>


</html>
