<?php
// -- Afficher les formateurs qui sont disponibles entre 2 dates :
echo "Afficher les formateurs qui sont disponibles entre 2 dates";
require "../json/connect.php";

if (isset($_POST['show'])) {
    $d_date = $_POST['d_date'];
    $f_date = $_POST['f_date'];
    $sessions = "SELECT
        *
    FROM
        Formateur
    WHERE
        Id_Formateur NOT IN (
            SELECT
                DISTINCT Id_Formateur
            FROM
                session
            WHERE
                Date_fin > $d_date
                AND Date_debut < $f_date
        )";
    $sessions = $conn->query($sessions);
    $sessions = $sessions->fetchAll(PDO::FETCH_ASSOC);

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <div>
            <label for="d_date">Date de début</label>
            <input type="date" id="d_date" name="d_date">
        </div>
        <div>
            <label for="f_date">Date de fin</label>
            <input type="date" id="f_date" name="f_date">
        </div>
        <input type="submit" value="show" name="show">
    </form>
    <div>
        <h2>result</h2>
        <?php
        if (isset($sessions)) {
            echo "<pre>";
            var_dump($sessions);
            echo "</pre>";
        }
        ?>
    </div>
</body>

</html>