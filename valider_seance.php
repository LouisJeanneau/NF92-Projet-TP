<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" href="styles.css">
</head>


<body>
	<h3>Ceci est la page valider_seance.php</h3>

	<?php
	
	$idseance = $_POST["menuChoixSeance"];

	$dbhost = 'tuxa.sme.utc';
  	$dbuser = 'nf92a079';
	$dbpass = 'gFoR4Pl9';
	$dbname = 'nf92a079';
    date_default_timezone_set('Europe/Paris');

	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

	$query  =  "SELECT inscription.ideleve, nom, prenom, dateNaiss, note FROM eleves, inscription WHERE eleves.ideleve=inscription.ideleve AND idseance=$idseance";
	// echo "<br>$query<br>";
	$result  =  mysqli_query($connect,  $query); 
	if (!$result) { echo "<br>Pas bon : ".mysqli_error($connect);}
	
	if(mysqli_num_rows($result) > 0){?>		
		<form method='POST' action='noter_eleve.php'>
		<table border=1 class="doubletable">
		<tr>
		<th>Nom - Prénom</th><th>Nombre de fautes (sur 40)</th>
		</tr>	

		<?php
			while ($row = mysqli_fetch_array($result, MYSQL_NUM)){
				echo "<tr><td>";
				echo $row[1]." - ".$row[2];
				echo "</td><td>";
				echo "<input type='number' min='0' max='40' style='margin : 0; width : 60' name='".$row[0]."'";
				if ($row[4]!=-1){
					echo " value=".$row[4];
				}
				echo ">";
				echo "</td></tr>";
			}
			mysqli_close($connect);
		?>

		<input type='hidden' name='idseance' value=<?php echo $idseance; ?>>		
		</table>	
		<input class="valider" type="submit" value="Valider les notes">
		</form>
	<?php
	}
	else{
		echo "<b>Il n'y avait aucun élève à cette séance</b>";
	}
	?>


</body>


</html>