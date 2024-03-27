<?php
// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <link rel="stylesheet" href="assets/styles2.css">

</head>
<body>

<div class="container">
    <h1>Bienvenue, <?php echo $_SESSION['login']; ?> !</h1>
    <br/>
    <br/>
</div>
    <div class="logout">
        <a href="logout.php">Déconnexion</a>
    </div>
    <br/>

<div class="add">
    <a href="add.php">Créer</a>
    <br/>
</div>
<br/>

<?php
    include ('includes/db.php');
    $conn = connect();

    $req= "SELECT * FROM block";
    $stmt = $conn->prepare($req);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nominal ID</th>
            <th>Name</th>
            <th>Stackable</th>
            <th>Gravity</th>
            <th>Transparency</th>
            <th>Luminous</th>
            <th>Loot</th>
            <th>Modify</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach($result as $row): ?>
        <tr>
            <?php foreach($row as $value): ?>
                <td><?php echo $value?></td>
            <?php endforeach; ?>
            <td>
                <a href="modif.php?id=<?php echo $row['id']; ?>">
                    <img class='modif' src='assets/modif.png' style='width:20px;height:20px'>
                </a>
            </td>
            <td>
                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                    <img class='supp' src='assets/supprimer.png' style='width:25px;height:25px'>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>

