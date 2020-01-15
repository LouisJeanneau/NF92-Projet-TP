<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" href="styles.css">
</head>


<body>


    <?php

    $dbhost = 'tuxa.sme.utc';
    $dbuser = 'nf92a079';
    $dbpass = 'gFoR4Pl9';
    $dbname = 'nf92a079';
    date_default_timezone_set('Europe/Paris');

    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
    $querry = "SELECT idseance, dateSeance, nom FROM seances, themes WHERE seances.idtheme=themes.idtheme AND dateSeance<=CURDATE()";
    $result = mysqli_query($connect,$querry);

    if(!$result){die('Requête invalide:'.mysqli_error($connect));}
    
    ?>
    
    <h3>Formulaire de validation d'une séance</h3>

    <b>Choisir une séance :</b>
    <FORM METHOD='POST' ACTION='valider_seance.php' >
    <select name='menuChoixSeance' size='20' required>
    <?php 
        while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
            echo "<option value=".$row[0].">".$row[1]." : ".$row[2]." </option>";
        } 
        mysqli_close($connect);
    ?>
    </select>
    <br>
    <INPUT class="valider" type='submit' value='Valider cette séance'>
    </FORM>
   
   
    <?php
    
    ?>


</body>

</html>