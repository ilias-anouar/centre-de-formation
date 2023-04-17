<?php
include "connect.php";

$json_file = file_get_contents('inscription.json');
$inscription = json_decode($json_file, true);
foreach ($inscription as $one) {

    echo "<pre>";
    var_dump($one);
    echo "</pre>";

    $Id_session = $one['Id_session'];
    $Id_apprenant_ = $one['Id_apprenant_'];
    $evaluation = $one['evaluation'];

    $sql = "INSERT INTO `inscription`(`Id_session`, `Id_apprenant_`, `evaluation`) VALUES ('$Id_session','$Id_apprenant_','$evaluation')";

    $conn->exec($sql);
}

$conn = null;


?>