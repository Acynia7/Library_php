<?php
    function connect(){
        $servername = "db"; // Nom du serveur
        $username = "root"; // Utilisateur
        $password = "root"; // Mot de passe
        $dbname = "library"; // Nom de la base de données
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password); // Effectue la connexion à la base de données
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion réussie!"; // Affiche un message en cas de succès de la connexion
            return $conn;
        } catch (PDOException $e) {
            echo "Connexion à la base de données ratée: " . $e->getMessage(); // Affiche un message d'erreur en cas d'échec de connexion
            return null;
        }
    }
?>