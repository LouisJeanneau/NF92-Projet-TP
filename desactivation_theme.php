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
  if(!$result){die('Requêteinvalide:'.mysqli_error($connect));}

  date_default_timezone_set('Europe/Paris');
  $ojd = date("Y\-m\-d");

  echo "<h3>Formulaire de désactivation d'un thème</h3>";

  echo "<b>Choisir un élève :</b>";
  echo "<FORM METHOD='POST' ACTION='desactiver_theme.php'>";
  echo "<select name='menuChoixTheme' size='15' required>";
  while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
    echo "<option value=".$row[0].">".$row[1]." : ".$row[3]." </option>";
    } 
  echo "</select>";
  echo "<INPUT class='valider' type='submit' value='Désactiver thème'>";
  echo "</FORM>";

  mysqli_close($connect);

  ?>


</body>

</html>