<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" href="styles.css">
</head>


<body>
	<h3>Inscrire élève</h3>


	<?php	
		date_default_timezone_set('Europe/Paris');
		$date = date("Y-m-d");
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92a079'; 
		$dbpass = 'gFoR4Pl9';
		$dbname = 'nf92a079';
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
	
		$idseance = $_POST["menuChoixSeance"];
		$ideleve = $_POST["menuChoixEleve"];
	?>

	
	<br>
	<table>
		<tr><th colspan="2"><b>Informations saisies :</b></th></tr>		
		<tr><td>idseance : </td><td> <?php echo "$idseance"; ?> </td></tr>
		<tr><td>ideleve : </td><td> <?php echo "$ideleve"; ?> </td></tr>
	</table>

	<?php		
		$query = "SELECT * FROM inscription WHERE idseance='$idseance' AND ideleve='$ideleve'";
		$result = mysqli_query($connect,$query);
		if(!$result){die('Requête invalide: '.mysqli_error($connect));}
		if(mysqli_num_rows($result) > 0){
			echo "<b>Cet élève est déjà inscrit à cette séance !</b>";
			}
		else{
			$query = "INSERT INTO  inscription  VALUES('$idseance', '$ideleve', -1)";
			// echo "<br>$query<br>";
			$result  =  mysqli_query($connect,  $query);
			if (!$result) { echo "<br>pas bon ".mysqli_error($connect);}
			else{echo "<b>L'élève a bien été ajouté</b>";}
			}
		mysqli_close($connect);


	?>
</body>


</html>