<?php
// -- Afficher le nombre d'inscrits par session de formation :
echo "Afficher le nombre d'inscrits par session de formation";
require "../json/connect.php";

$sessions = "SELECT Id_session FROM session";
$sessions = $conn->query($sessions);
$sessions = $sessions->fetchAll(PDO::FETCH_ASSOC);

foreach ($sessions as $session) {
    $Id_session = $session['Id_session'];
    $sql = "SELECT COUNT(Id_session) FROM inscription WHERE Id_session = $Id_session";
    $resul = $conn->query($sql);
    $resul = $resul->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    echo "the number of inscriptions in the session N " . $Id_session . " is " . $resul[0]['COUNT(Id_session)'];
    // var_dump($resul[0]);
    echo "</pre>";
}

?>