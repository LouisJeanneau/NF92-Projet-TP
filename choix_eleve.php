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

    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
    $querry = "SELECT * FROM eleves ORDER BY nom";
    $result = mysqli_query($connect,$querry);
    if(!$result){die('Requêteinvalide:'.mysqli_error($connect));}

    date_default_timezone_set('Europe/Paris');
    $date = date("Y\-m\-d");
    ?>

    <h3>Formulaire de désincription d'un élève à une séance</h3>

    <b>Choisir un élève :</b>
    <FORM METHOD='POST' ACTION='choisir_seance.php'>
    
    <select name='menuChoixEleve' size='15' required>
    
    <?php
        while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
            echo "<option value=".$row[0].">".$row[1]." ".$row[2]." </option>";
        } 
        mysqli_close($connect);
    ?>

    </select>
    <INPUT class='valider' type='submit' value="Choisir cet élève">
    </FORM>

</body>

</html>