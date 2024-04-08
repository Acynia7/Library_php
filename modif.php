<?php

include('includes/db.php');
$conn = connect();

// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Vérifier si l'ID est défini dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sql2 = "SELECT * FROM library.block WHERE id = ?";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute([$id]);
$block = $stmt2->fetch(PDO::FETCH_ASSOC);

if (!empty($_POST)) {
    // Utilisez une requête UPDATE pour mettre à jour le nom d'utilisateur et le mot de passe
    $sql = "UPDATE library.block SET nominal_id=?, name=?, stackable=?, gravity=?, transparency=?, luminous=?, loot=? WHERE id=?;";
    $stmt = $conn->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(1, $_POST['nominal']);
    $stmt->bindParam(2, $_POST['name']);
    $stmt->bindParam(3, $_POST['stack']);
    $stmt->bindParam(4, $_POST['gravity']);
    $stmt->bindParam(5, $_POST['trans']);
    $stmt->bindParam(6, $_POST['luminous']);
    $stmt->bindParam(7, $_POST['loot']);
    $stmt->bindParam(8, $_POST['id']); // Assurez-vous d'avoir l'ID du block à mettre à jour

    // Exécution de la requête
    $result = $stmt->execute();

    // Gérer la modification de l'image
    if ($result) {
        // Si une image est téléchargée
        if (isset($_FILES['file'])) {
            $tmpName = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $error = $_FILES['file']['error'];

            // Générer un nouveau nom de fichier unique basé sur l'ID
            $newFileName = 'img_' . $id . '.png';

            // Déplacer le fichier téléchargé vers l'emplacement désiré avec le nouveau nom de fichier
            move_uploaded_file($tmpName, 'assets/img/' . $newFileName);
        }

        header("Location: welcome.php");
        exit(); // Assurez-vous de sortir du script après la redirection
    } else {
        echo "Erreur lors de la mise à jour du block";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Update </title>
    <link rel="stylesheet" href="assets/styles2.css">
</head>
<body>
    <h1 class="create"> Block update </h1>
    <form class="create" action="modif.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
    Nominal ID: <br>
        <input type="text" name="nominal" value="<?php echo $block['nominal_id'] ?? '' ?>"> <br>
        Name: <br>
        <input type="text" name="name" value="<?php echo $block['name'] ?? '' ?>"> <br>
        Stackable: <br>
        <input type="text" name="stack" value="<?php echo $block['stackable'] ?? '' ?>"> <br>
        Gravity? <br>
        <select class="select" id="gravity" value="<?php echo $block['gravity'] ?? '' ?>"> <option value="0"> No </option> <option value="1"> Yes </option> </select> <br>
        Transparent? <br>
        <select class="select" id="trans" value="<?php echo $block['trans'] ?? '' ?>"> <option value="0"> No </option> <option value="1"> Yes </option> </select> <br>
        Luminous? <br>
        <select class="select" id="luminous" value="<?php echo $block['luminous'] ?? '' ?>"> <option value="0"> No </option> <option value="1"> Yes </option> </select> <br>
        Loot: <br>
        <input type="text" name="loot" value="<?php echo $block['loot'] ?? '' ?>"> <br>

        <!-- Ajouter un champ caché pour l'ID de l'utilisateur -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        
        <!-- Ajouter un champ pour l'upload de l'image -->
        <label for="file">Image: </label>
        <input type="file" name="file">

        <input type="submit" name="send" value="Update"> <br> <br>
    </form>
</body>  
</html>
