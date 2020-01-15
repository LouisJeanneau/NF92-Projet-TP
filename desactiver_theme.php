<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" href="styles.css">
</head>


<body>
	<h3>Desactivation d'un thème</h3>


	<?php
	
	$idtheme = $_POST["menuChoixTheme"];

	echo "<table>";
	echo "<tr><th colspan=2><b>Informations saisies :</b> </th></tr>";
	echo "<tr><td>Id du thème : </td><td> $idtheme </td></tr>";
	echo "</table>";


	date_default_timezone_set('Europe/Paris');
	$date = date("Y-m-d");
	$dbhost = 'tuxa.sme.utc';
  	$dbuser = 'nf92a079';
	$dbpass = 'gFoR4Pl9';
	$dbname = 'nf92a079';
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

	$query  =  "UPDATE themes SET supprime=1 where idtheme=$idtheme";
	//echo "<br>$query<br>";
	$result  =  mysqli_query($connect,  $query);
	if (!$result) { echo "<br>pas bon ".mysqli_error($connect);}
	else{echo "<b>Le thème a bien été désactivé !</b>";}
	mysqli_close($connect);

	


	?>
</body>


</html>