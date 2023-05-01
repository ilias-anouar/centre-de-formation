<?php
// -- Afficher l'historique des sessions de formation d'un apprenant donné :
echo "Afficher l'historique des sessions de formation d'un apprenant donné";
require "../json/connect.php";

$apprenant = "SELECT Id_session FROM inscription WHERE Id_apprenant_ = 32";
$apprenant = $conn->query($apprenant);
$apprenant = $apprenant->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
var_dump($apprenant);
echo "</pre>";

foreach ($apprenant as $session) {
    $Id_session = $session['Id_session'];
    $sql = "SELECT * FROM session WHERE Id_session = $Id_session";
    $resul = $conn->query($sql);
    $resul = $resul->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    var_dump($resul);
    echo "</pre>";
}

?>