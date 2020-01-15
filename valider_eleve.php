<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" href="styles.css">
</head>


<body>
	<h3>Ajout d'un nouvel élève doublon</h3>


	<?php
	
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$ddn= $_POST["ddn"];
	

	?>

	<table>
		<tr><th colspan="2"><b>Informations saisies :</b> </th></tr>
		<tr><td>nom : </td><td> <?php echo "$nom"; ?> </td></tr>
		<tr><td>prenom : </td><td> <?php echo "$prenom"; ?> </td></tr>
		<tr><td>date de naissance : </td><td> <?php echo "$ddn"; ?> </td></tr>
	</table>

	<?php
	date_default_timezone_set('Europe/Paris');
	$date = date("Y-m-d");
	$dbhost = 'tuxa.sme.utc';
	$dbuser = 'nf92a079'; 
	$dbpass = 'gFoR4Pl9';
	$dbname = 'nf92a079';
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
		
	$query  =  "insert  into  eleves  values  (NULL, '$nom' ,  '$prenom' , "."'$ddn'"."  ,"."'$date'".")";
	//echo "<br>$query<br>";
	$result  =  mysqli_query($connect,  $query);
	if (!$result) { echo "<br>pas bon ".mysqli_error($connect);}
    mysqli_close($connect);

	echo "<b>L'élève possédant les mêmes informations a bien été ajouté !</b>";
    
    ?>
</body>


</html>
