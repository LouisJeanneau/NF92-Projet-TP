<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" href="styles.css">
</head>


<body>
	<h3>Calendrier d'un élève</h3>


	<?php
	
	$ideleve = $_POST["menuChoixEleve"];

	date_default_timezone_set('Europe/Paris');
	$date = date("Y-m-d");
	$dbhost = 'tuxa.sme.utc';
  	$dbuser = 'nf92a079';
	$dbpass = 'gFoR4Pl9';
	$dbname = 'nf92a079';
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

	//$query = "SELECT * FROM eleves WHERE ideleve=$ideleve";
    $query = "SELECT inscription.idseance, ideleve, seances.idtheme, dateSeance, nom FROM inscription INNER JOIN seances ON inscription.idseance=seances.idseance INNER JOIN themes ON seances.idtheme=themes.idtheme WHERE ideleve=$ideleve and dateSeance>=CURDATE() ORDER BY dateSeance";
	//echo "<br>$query<br>";
	$result  =  mysqli_query($connect,  $query);
	if (!$result) {echo "<br>pas bon ".mysqli_error($connect);}
    elseif(mysqli_num_rows($result) == 0){
        echo "L'élève n'a pas de séances prévues dans le futur";
        }
	else{
        echo "<table>";
        while($row = mysqli_fetch_array($result, MYSQL_NUM)){
            echo "<tr><td>Séance le ".$row[3]." sur le thème : ".$row[4]."</td></tr>";
        }
        echo "</table>";
    }
	mysqli_close($connect);

	


	?>
</body>


</html>