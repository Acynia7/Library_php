<?php
    // Démarrage de la session
    session_start();

    // Traitement du formulaire si des données ont été soumises
    if (!empty($_POST)) {
        // Connexion à la base de données
        include ('includes/db.php');
        $conn = connect();
        
        // Récupération des données du formulaire
        $username = $_POST['login'];
        $password = $_POST['mdp'];

        // Préparation et exécution de la requête SQL
        $req = "SELECT login, password FROM login WHERE login=:login";
        $stmt = $conn->prepare($req);
        $stmt->bindParam(':login', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérification des informations d'identification
        if ($result && password_verify($password, $result['password'])) {
            // Authentification réussie : enregistrement de l'utilisateur dans la session et redirection
            $_SESSION['login'] = $username;
            header("Location: welcome.php");
            exit; // Assure que le script s'arrête ici
        }  
        else {
            // Authentification échouée : affichage d'un message d'erreur
            echo "<p class=text> /!\ Nom d'utilisateur ou mot de passe incorrect. </p>";
        }

        // Fermeture de la connexion à la base de données
        $conn = null; 
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Login </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/styles.css">
    </head>

    <body>
        <form action="login.php" method="POST">
            <p> Bonjour, veuillez vous identifier </p>
            Login: <br>
            <input type="text" name="login" placeholder="Entrer le nom d'utilisateur"> <br> <br>

            Password: <br>
            <input type="password" name="mdp" placeholder="Entrer le mot de passe"> <br> <br>

            <input type="submit" name="send" value="Envoyer"> <br> <br>
        </form>
        <p class="text">Pas de compte? <a href="register.php">Créer un compte </a> </p>

    </body>
</html>