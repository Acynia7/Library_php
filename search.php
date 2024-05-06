<?php
$results = [];
if (!empty($_POST['q'])) {
    include('includes/db.php');
    $conn = connect();

    // Récupérer la valeur du champ de recherche
    $search = $_POST['q'];

    // Requête SQL pour rechercher dans la base de données
    $sql = "SELECT * FROM library.block WHERE name LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(["%$search%"]);
    $results = $stmt->fetchAll(); // Récupérer tous les résultats

    if (!$results){
        echo "<p style='color: white;'>No info found with this keyword!</p>";
    }
} else {
    echo "<p style='color: white;'>Please enter a keyword to search.</p>";
}
?>


<!DOCTYPE html>
<html>
<head>
    <title> Result </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div>
    <?php if (!empty($results)): ?>
        <?php foreach ($results as $result): ?>
        <div class="container-search">
            <div class="image">
                <img class="detail" src='assets/img/img_<?php echo $result['id']; ?>.png'>
            </div>
            <div class="text-container">
                <p>
                Nominal ID : <?php echo $result['nominal_id']; ?> <br>
                Name : <?php echo $result['name']; ?> <br>
                Stackable : <?php echo $result['stackable']; ?> <br>
                Gravity : <?php echo $result['gravity']; ?> <br>
                Transparency : <?php echo $result['transparency']; ?> <br>
                Luminous : <?php echo $result['luminous']; ?> <br>
                Loot : <?php echo $result['loot']; ?> <br>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style='color: white;'>No info found with this keyword!</p>
    <?php endif; ?>
</div>
</body>
</html>
