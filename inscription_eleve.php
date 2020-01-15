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
        $ojd = date("Y\-m\-d");

        $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

        $query0 = "";

        $query1 = "SELECT seances.idseance, dateSeance, nom, effMax FROM seances INNER JOIN themes ON seances.idtheme = themes.idtheme WHERE dateSeance >=CURDATE() AND seances.idtheme=themes.idtheme AND (SELECT count(ideleve) from inscription where idseance=seances.idseance)<effMax ORDER BY dateSeance";
        $result1 = mysqli_query($connect, $query1);
        if(!$result1){die('Requêteinvalide:'.mysqli_error($connect));}
        $query2 = "SELECT * FROM eleves ORDER BY nom";
        $result2 = mysqli_query($connect, $query2);
        if(!$result2){die('Requêteinvalide:'.mysqli_error($connect));}


        mysqli_close($connect);

    ?>

    <h3>Formulaire d'inscription d'un élève à une séance</h3>

    <FORM METHOD='POST' ACTION='inscrire_eleve.php'>
    <table class='doubletable'>
    <tr> <td class='doubletd'>
    <b>Séance : </b> <br>
    <select name='menuChoixSeance' size='20' style="width: 100%" required>
    <?php
        while ($row = mysqli_fetch_array($result1, MYSQL_NUM)) {
            echo "<option value=".$row[0].">".$row[1]." : ".$row[2]."</option>";
        }
    ?>
    </select>
    </td><td class='doubletd'>
    <b>Élève : </b> <br>
    <select name='menuChoixEleve' size='20' style="width: 100%" required>
    <?php
        while ($row = mysqli_fetch_array($result2, MYSQL_NUM)) {
            echo "<option value=".$row[0].">".$row[1]." ".$row[2]."</option>";
        }
    ?>
    </select>
    </td></tr>
    </table>
    <INPUT class="valider" type='submit' value='Inscrire élève'>
    </FORM>



</body>

</html>

</html>
