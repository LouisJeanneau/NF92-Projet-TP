<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" href="styles.css">
</head>


<body>
	<h3>Supprimer séance</h3>


	<?php
	
	$idseance = $_POST["menuChoixSeance"];

	echo "<table>";
	echo "<tr><th colspan=2><b>Informations saisies :</b> </th></tr>";
	echo "<tr><td>idseance : </td><td> $idseance </td></tr>";
	echo "</table>";


	date_default_timezone_set('Europe/Paris');
	$date = date("Y-m-d");
	$dbhost = 'tuxa.sme.utc';
  	$dbuser = 'nf92a079';
	$dbpass = 'gFoR4Pl9';
	$dbname = 'nf92a079';
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

	$query0  =  "SELECT count(ideleve) FROM inscription WHERE idseance=$idseance";
	$result  =  mysqli_query($connect,  $query0);
	if (!$result) {echo "<br>pas bon ".mysqli_error($connect);}
	else{
		$row=mysqli_fetch_array($result);
		echo "Il y avait ".$row[0]." élèves inscrits<br> ";
	}
	$query1  =  "DELETE FROM inscription WHERE idseance=$idseance";
	$result  =  mysqli_query($connect,  $query1);
	if (!$result) { echo "<br>pas bon ".mysqli_error($connect);}
	else{
        echo "<b>Tous les élèves inscrits à cette séance ont été désinscrits.</b><br>";
        $query2 = "DELETE FROM seances WHERE idseance=$idseance";
        $result  =  mysqli_query($connect,  $query2);
	    if (!$result) {echo "<br>pas bon ".mysqli_error($connect);}
	    else{echo "<b>La séance a bien été supprimée.</b>";}
	}
	mysqli_close($connect);
    ?>
</body>

</html>