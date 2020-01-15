<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" href="styles.css">
</head>


<body>
	<h3>Nombre moyen de fautes par thème</h3>


	<?php	

	date_default_timezone_set('Europe/Paris');
	$date = date("Y-m-d");
	$dbhost = 'tuxa.sme.utc';
  	$dbuser = 'nf92a079';
	$dbpass = 'gFoR4Pl9';
	$dbname = 'nf92a079';
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

	$query= "SELECT seances.idtheme, nom, AVG(note) FROM inscription INNER JOIN seances ON inscription.idseance=seances.idseance INNER JOIN themes ON seances.idtheme=themes.idtheme WHERE inscription.note!=-1 GROUP BY seances.idtheme";
	$result  =  mysqli_query($connect,  $query);
	if (!$result) { echo "<br>pas bon ".mysqli_error($connect);}
	else{
        echo "<table border='1'>";
	    echo "<tr><th><b>Thème</b></th><th>Nombre moyen de fautes</th></tr>";
        while($row=mysqli_fetch_array($result, MYSQLI_NUM)){        
            echo "<tr><td>".$row[1]."</td><td>".$row[2]."</td></tr>";
        }
        echo "</table>";
    }
	mysqli_close($connect);

	
	?>
</body>


</html>


