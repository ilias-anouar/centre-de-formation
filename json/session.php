<?php
include "connect.php";

$json_file = file_get_contents('session.json');
$session = json_decode($json_file, true);
foreach ($session as $one) {

    echo "<pre>";
    var_dump($one);
    echo "</pre>";

    $Date_fin = '';
    $Places_max = $one['Places_max'];
    $Etat = $one['Etat'];
    $Id_Formateur = $one['Id_Formateur'];
    $Id_formation_ = $one['Id_formation_'];


    $sql = "INSERT INTO `session`(`Date_debut`, `Date_fin`, `Places_max`, `Etat`, `Id_Formateur`, `Id_formation_`) VALUES (Now(),DATE_ADD(Now() , INTERVAL 4 DAY),'$Places_max','$Etat','$Id_Formateur','$Id_formation_')";

    $conn->exec($sql);
}

$conn = null;


?>