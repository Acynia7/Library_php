<?php
include('includes/db.php');
$conn = connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT nominal_id, name, stackable, gravity, transparency, luminous, loot FROM block WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        // Redirect to index.php if no result found
        header("Location: index.php");
        exit;
    }
} else {
    // Redirect to index.php if no ID provided
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <title> Details </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets\style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="details">
    <div class="details">
        <?php if ($result): ?>
        Nominal ID : <?php echo $result['nominal_id']; ?> <br>
        Name : <?php echo $result['name']; ?> <br>
        Stackable : <?php echo $result['stackable']; ?> <br>
        Gravity : <?php echo $result['gravity']; ?> <br>
        Transparency : <?php echo $result['transparency']; ?> <br>
        Luminous : <?php echo $result['luminous']; ?> <br>
        Loot : <?php echo $result['loot']; ?> <br>
        <?php else: ?>
        <p>No details found for this ID.</p>
        <?php endif; ?>
    </div>
</body>

</html>
