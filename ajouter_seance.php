<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" href="styles.css">
</head>


<body>
	<h3>Ajouter séance</h3>


	<?php
	date_default_timezone_set('Europe/Paris');
    $date = date("Y\-m\-d");

	$idtheme = $_POST["menuChoixTheme"];
	$EffMax = $_POST["EffMax"];
	$DateSeance = $_POST["DateSeance"];

	echo "<table border='1'>";
	echo "<tr><th colspan=2><b>Informations saisies :</b> </th></tr>";
	echo "<tr><td>Id du thème : </td><td> $idtheme </td></tr>";
	echo "<tr><td>Effectif maximum : </td><td> $EffMax </td></tr>";
	echo "<tr><td>date de la séance : </td><td> $DateSeance </td></tr>";
	echo "</table>";

	$dbhost = 'tuxa.sme.utc';
  	$dbuser = 'nf92a079';
	$dbpass = 'gFoR4Pl9';
	$dbname = 'nf92a079';
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

	// Vérification de l'existence d'une seance au même thème à la même date
	$query = "SELECT * FROM seances WHERE dateSeance=\"$DateSeance\" AND idtheme=\"$idtheme\"";
	$result = mysqli_query($connect,  $query);	
	if (!$result){echo "<br>pas bon lors de la vérif ".mysqli_error($connect);}


	// Si il existe déjà une séance
	if(mysqli_num_rows($result) > 0){
		echo "<b>Une séance avec le même thème à la même date existe déjà.<br>Ce n'est pas possible de créer un doublon</b>";
	}
	else{
		$query  =  "INSERT  INTO  seances  VALUES(NULL, '$DateSeance' ,  '$EffMax' , '$idtheme')";
		$result  =  mysqli_query($connect,  $query); 
		if(!$result){echo "<br>pas bon lors de l'ajout ".mysqli_error($connect);}
		else{echo "<b>La séance a bien été créée !</b>";}
	}
	mysqli_close($connect);

	?>
</body>


</html>
