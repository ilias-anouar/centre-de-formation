<?php
require "../json/connect.php";

$sql = "SELECT *
FROM session
WHERE Id_Formateur  = 5";

$resul = $conn->query($sql);
$resul = $resul->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
var_dump($resul);
echo "</pre>";

?>
