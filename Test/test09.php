<?php
// -- Afficher le nombre total des inscrits par catégorie de formation :
echo "Afficher le nombre total des inscrits par catégorie de formation";
require "../json/connect.php";

$sessions = "SELECT
    formation_.categorie,
    COUNT(DISTINCT inscription.Id_apprenant_) AS Nombre_d_inscrits
FROM
    inscription
    JOIN session ON inscription.Id_session = session.Id_session
    JOIN formation_ ON session.Id_formation_ = formation_.Id_formation_
GROUP BY
    formation_.categorie;
;
;
";
$sessions = $conn->query($sessions);
$sessions = $sessions->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
var_dump($sessions);
echo "</pre>";

// foreach ($apprenant as $session) {
//     $Id_session = $session['Id_session'];
//     $sql = "SELECT * FROM session WHERE Id_session = $Id_session";

//     $resul = $conn->query($sql);
//     $resul = $resul->fetchAll(PDO::FETCH_ASSOC);
//     echo "<pre>";
//     var_dump($resul);
//     echo "</pre>";
// }

?>