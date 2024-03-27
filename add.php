<?php
// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

if (!empty($_POST)) {
    include ('includes/db.php');
    $conn = connect();

    $req = $conn->prepare("INSERT INTO library.block (nominal_id, name, stackable, gravity, transparency, luminous, loot) VALUES(:nominal, :name, :stack, :gravity, :trans, :luminous, :loot);");

    $nominal = $_POST['nominal'];
    $name = $_POST['name'];
    $stack = $_POST['stack'];
    $gravity = $_POST['gravity'];
    $trans = $_POST['trans'];
    $luminous = $_POST['luminous'];
    $loot = $_POST['loot'];

    // Liaison des paramètres
    $req->bindParam(':nominal', $nominal);
    $req->bindParam(':name', $name);
    $req->bindParam(':stack', $stack);
    $req->bindParam(':gravity', $gravity);
    $req->bindParam(':trans', $trans);
    $req->bindParam(':luminous', $luminous);
    $req->bindParam(':loot', $loot);

    // Exécution de la requête
    $result = $req->execute();

    if ($result) {
        header("Location: welcome.php");
        exit(); // Assurez-vous de sortir du script après la redirection
    } else {
        echo "Erreur lors de la création du block";
    }
}
?>

<!doctype html>
<html>
    <head>
        <title> Creation </title>
        <link rel="stylesheet" href="assets/styles2.css">
    </head>

    <body>
        <h1 class="create"> New block creation </h1>

        <form class="create" action="add.php" method="post">
            Nominal ID: <br>
            <input type="text" name="nominal"></input> <br>
            Name: <br>
            <input type="text" name="name"></input> <br>
            Stackable: <br>
            <input type="text" name="stack"></input> <br>
            Gravity? (0 (No) / 1 (Yes)): <br>
            <input type="text" name="gravity"></input> <br>
            Transparent? (0 / 1): <br>
            <input type="text" name="trans"></input> <br>
            Luminous? (0 / 1): <br>
            <input type="text" name="luminous"></input> <br>
            Loot: <br>
            <input type="text" name="loot"></input> <br>

            <input type="submit" name="send" value="Create"> <br> <br>
        </form>
    </body>