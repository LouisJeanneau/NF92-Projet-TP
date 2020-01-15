<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" href="styles.css">
</head>


<body>
	<h3>Consultation d'un élève avec statistiques</h3>


	<?php
	
	$ideleve = $_POST["menuChoixEleve"];

	date_default_timezone_set('Europe/Paris');
	$date = date("Y-m-d");
	$dbhost = 'tuxa.sme.utc';
  	$dbuser = 'nf92a079';
	$dbpass = 'gFoR4Pl9';
	$dbname = 'nf92a079';
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

	$query  =  "SELECT * FROM eleves WHERE ideleve=$ideleve";
	//echo "<br>$query<br>";
	$result  =  mysqli_query($connect,  $query);
	if (!$result) { echo "<br>pas bon ".mysqli_error($connect);}
	else{
        $row=mysqli_fetch_array($result);
        echo "<table border='1'>";
	    echo "<tr><th colspan='2'><b>Informations sur l'élève :</b> </th></tr>";
	    echo "<tr><td>id : </td><td> $row[0] </td></tr>";
	    echo "<tr><td>Nom : </td><td> $row[1] </td></tr>";
	    echo "<tr><td>Prénom : </td><td> $row[2] </td></tr>";
        echo "<tr><td>Date de naissance : </td><td> $row[3] </td></tr>";
        echo "<tr><td>Date d'inscription : </td><td> $row[4] </td></tr>";
		$query= "SELECT avg(note), count(note) FROM inscription WHERE note!=-1 AND ideleve=$ideleve";
		$result  =  mysqli_query($connect,  $query);
		if (!$result) { echo "<br>pas bon ".mysqli_error($connect);}
		else{
			$moyenne=mysqli_fetch_array($result);
			echo "<tr><td colspan=2></td></tr>";
			echo "<tr><td>Moyenne de fautes : </td><td> $moyenne[0] </td></tr>";
			echo "<tr><td>Présent à : </td><td> $moyenne[1] séance(s)</td></tr>";
			}
	    echo "</table><br>";
    }

	

	mysqli_close($connect);

	


	?>
</body>


</html>