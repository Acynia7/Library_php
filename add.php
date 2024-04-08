<?php
include('includes/db.php');
$conn = connect();

// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

if (!empty($_POST)) {
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
        // Get the ID of the newly inserted record
        $lastInsertId = $conn->lastInsertId();

        // Upload the file with the ID as its name
        if (isset($_FILES['file'])) {
            $tmpName = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $error = $_FILES['file']['error'];

            // Construct the new filename using the ID
            $newFileName = 'img_' . $lastInsertId . '.png';

            // Move the uploaded file to the desired location with the new filename
            move_uploaded_file($tmpName, 'assets/img/' . $newFileName);
        }

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

<form class="create" action="add.php" method="post" enctype="multipart/form-data">
    Nominal ID: <br>
    <input type="text" name="nominal"></input> <br>
    Name: <br>
    <input type="text" name="name"></input> <br>
    Stackable: <br>
    <input type="text" name="stack"></input> <br>
    Gravity?: <br>
    <select class="select" id="gravity"> <option value="0"> No </option> <option value="1"> Yes </option> </select> <br>
    Transparent?: <br>
    <select class="select" id="trans"> <option value="0"> No </option> <option value="1"> Yes </option> </select> <br>
    Luminous?: <br>
    <select class="select" id="luminous"> <option value="0"> No </option> <option value="1"> Yes </option> </select> <br>
    Loot: <br>
    <input type="text" name="loot"></input> <br>
    <label for="file">Image: </label>
    <input type="file" name="file">

    <input type="submit" name="send" value="Create"> <br> <br>
</form>
</body>
</html>
