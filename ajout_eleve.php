<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
	<link rel="stylesheet" href="styles.css">
</head>


<body>
	<h3>Formulaire d'ajout d'un nouvel élève</h3>	
	<FORM  METHOD='POST'  ACTION="ajouter_eleve.php">
	Nom de famille : 
	<br> 
	<input type="text" name="nom" placeholder="Nom" maxlength="30" pattern="[A-Za-zÀ-ž'\-\s]{1,}" required>
	<br> 
	Prénom : 
	<br> 
	<input type="text" name="prenom" placeholder="Prénom" maxlength="30" pattern="[A-Za-zÀ-ž'\-\s]{1,}" required>
	<br> 		
	Date de naissance : 
	<br> 
	<input type="date" name="ddn" value="2000-01-01" min="1900-01-01" max="<?php date_default_timezone_set('Europe/Paris'); echo date('Y-m-d', strtotime('-15 year')); ?>">
	<br> 
	<input class="valider" VALUE="Envoyer" TYPE="SUBMIT"> 
	</FORM> 
</body>


</html>


