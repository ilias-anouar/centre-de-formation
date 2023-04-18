<?php
// -- Afficher la liste des apprenants d' une session donnée d 'un formateur donné :
echo "Afficher la liste des apprenants d' une session donnée d 'un formateur donné";
require "../json/connect.php";

$apprenant = "SELECT *
FROM inscription
JOIN apprenant_ 
ON inscription.Id_apprenant_ = apprenant_.Id_apprenant_
JOIN session 
ON inscription.Id_session = session.Id_session
WHERE inscription.Id_session = 41 
AND session.Id_Formateur = 1;
";
$apprenant = $conn->query($apprenant);
$apprenant = $apprenant->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
var_dump($apprenant);
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