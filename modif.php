<?php
// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Vérifier si l'ID est défini dans l'URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
} 

if (!empty($_POST)) {
    include ('includes/db.php');
    $conn = connect();
    
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

    // Redirection après la mise à jour
    if ($result) {
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

    <form class="create" action="modif.php?id=<?php echo $id ?>" method="post">
        Nominal ID: <br>
        <input type="text" name="nominal"></input> <br>
        Name: <br>
        <input type="text" name="name"></input> <br>
        Stackable: <br>
        <input type="text" name="stack"></input> <br>
        Gravity (0 (No) / 1 (Yes)): <br>
        <input type="text" name="gravity"></input> <br>
        Transparent (0 / 1): <br>
        <input type="text" name="trans"></input> <br>
        Luminous (0 / 1): <br>
        <input type="text" name="luminous"></input> <br>
        Loot: <br>
        <input type="text" name="loot"></input> <br>

        <!-- Ajouter un champ caché pour l'ID de l'utilisateur -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>"></input>

        <input type="submit" name="send" value="Update"> <br> <br>
    </form>
</body>  
</html>


