<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" href="styles.css">
</head>


<body>
	<h3>Désinscrire un élève d'une séance</h3>


	<?php

	$ideleve = $_POST["ideleve"];
  $idseance = $_POST["idseance"];

	date_default_timezone_set('Europe/Paris');
	$date = date("Y-m-d");
	$dbhost = 'tuxa.sme.utc';
  $dbuser = 'nf92a079';
	$dbpass = 'gFoR4Pl9';
	$dbname = 'nf92a079';
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

	$query  =  "DELETE FROM inscription WHERE idseance=$idseance AND ideleve=$ideleve";
	//echo "<br>$query<br>";
	$result  =  mysqli_query($connect,  $query);
	if (!$result) { echo "<br>pas bon ".mysqli_error($connect);}
	else{
        echo "<b>Elève désincrit de la séance.</b>";
    }
	mysqli_close($connect);




	?>
</body>


</html>
