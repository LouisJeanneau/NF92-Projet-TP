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
    $querry = "SELECT * FROM themes where supprime=0";
    $result = mysqli_query($connect,$querry);

    if(!$result){
      die('Requêteinvalide:'.mysqli_error($connect));
      }


    date_default_timezone_set('Europe/Paris');
    $ojd = date("Y\-m\-d");
  ?>


  <h3>Formulaire d'ajout d'un nouvelle séance</h3>
  <FORM METHOD='POST' ACTION='ajouter_seance.php'>
  Sélection du thème :
  <br>
  <select name='menuChoixTheme' size='15' required>
	// Création des option avec boucle while en php
    <?php
      while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
        echo "<option value=".$row[0].">".$row[1]." : ".$row[3]."</option>";
        }
      mysqli_close($connect);
    ?>

  </select>
  <br>
  Effectif Max :
  <br>
  <input type='number' name='EffMax' required min='1' placeholder="Effectif">
  <br>
  Date de la séance :
  <br>
  <input type='date' name='DateSeance' min='<?php date_default_timezone_set('Europe/Paris'); echo date('Y-m-d'); ?>' required>
  <input class='valider' type='submit' value='Enregistrer séance'>
  </FORM>

</body>

</html>
