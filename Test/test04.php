<?php
// -- Afficher l'historique des sessions de formation d'un apprenant donné :
echo "Afficher l'historique des sessions de formation d'un apprenant donné";
require "../json/connect.php";

$apprenant = "SELECT Id_session FROM inscription WHERE Id_apprenant_ = 3";
$apprenant = $conn->query($apprenant);
$apprenant = $apprenant->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
var_dump($apprenant);
echo "</pre>";


// $sql = "SELECT Id_session.* FROM inscription JOIN session ON inscription.Id_session = session.Id_session WHERE inscription.Id_apprenant_ = [Identifiant de l 'apprenant donné]";

// $resul = $conn->query($sql);
// $resul = $resul->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// var_dump($resul);
// echo "</pre>";
?>