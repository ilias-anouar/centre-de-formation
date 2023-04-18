<?php
// -- Afficher le nombre d'inscrits par session de formation :
echo "Afficher le nombre d'inscrits par session de formation";
require "../json/connect.php";

$sessions = "SELECT Id_session FROM session";
$sessions = $conn->query($sessions);
$sessions = $sessions->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
var_dump($sessions);
echo "</pre>";

foreach ($sessions as $session) {
    $Id_session
    $sql = "SELECT * FROM inscription JOIN session ON inscription.Id_session = session.Id_session GROUP BY session.Id_session";
}

// $resul = $conn->query($sql);
// $resul = $resul->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// var_dump($resul);
// echo "</pre>";
?>