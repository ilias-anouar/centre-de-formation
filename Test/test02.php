<?php
// -- Afficher les sessions de formation à venir avec des places encore disponibles :
require "../json/connect.php";

$sql = "SELECT *
FROM session
WHERE Places_max > (
        SELECT COUNT()
        FROM inscription
        WHERE
            inscription.Id_session = Identifiant
    )
    AND Etat = 'en cours dinscription'";

$resul = $conn->query($sql);
$resul = $resul->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
var_dump($resul);
echo "</pre>";
?>