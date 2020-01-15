<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" href="styles.css">
</head>


<body>
	<h3>Ceci est la page noter_eleve.php</h3>

	<?php

	$idseance = $_POST["idseance"];

	$dbhost = 'tuxa.sme.utc';
  	$dbuser = 'nf92a079';
	$dbpass = 'gFoR4Pl9';
	$dbname = 'nf92a079';
    date_default_timezone_set('Europe/Paris');

	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

	$query  =  "SELECT inscription.ideleve, nom, prenom, dateNaiss, note FROM eleves, inscription WHERE eleves.ideleve=inscription.ideleve AND idseance=$idseance";
	//echo "<br>$query<br>";
	$result  =  mysqli_query($connect,  $query);
	if (!$result) { echo "<br>pas bon ".mysqli_error($connect);}

    while($row = mysqli_fetch_array($result, MYSQL_NUM)){
        $note=$_POST["$row[0]"];
		if (strlen($note)==0){
			echo "Le nombre de fautes de ".$row[1]." ".$row[2]." n'a pas été inscrit. <br>";
			}
        else{
            $maj  =  mysqli_query($connect, "UPDATE `inscription` SET `note`=$note WHERE ideleve=$row[0] and idseance=$idseance");
            if (!$maj) { echo "<br>pas bon ".mysqli_error($connect);}
			else{
				echo "Le nombre de faute de ".$row[1]." ".$row[2]." a été inscrit à ".$note.". <br>";
			}
        }

	}


	mysqli_close($connect);


	?>


</body>


</html>