<?php
// -- Afficher toutes les sessions d une formation donnée :
echo "Afficher toutes les sessions d une formation donnée";
require "../json/connect.php";

$sessions = "SELECT
    *
FROM
    session
WHERE
    Id_formation_ = 3";
$sessions = $conn->query($sessions);
$sessions = $sessions->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
var_dump($sessions);
echo "</pre>";

?>