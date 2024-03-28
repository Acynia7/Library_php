<?php
    include ('includes/db.php');
    $conn = connect();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Index </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets\style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col col-2"> &nbsp; </div>
            <div class="col text-left bg-white"> 
                <a class="navbar-brand" href="index.php"> <img class="logo" src="assets/logo.jpg" style="object-fit: contain; margin-right: 0.3em"> </a>
                <a href="login.php">Connect as an admin</a>
            </div>
            <div class="col col-2"> &nbsp; </div>
        </div>

        <div class="row">
            <div class="col col-2"> &nbsp; </div>
            <div class="col col-8 text-center bg-secondary-subtle text-right"> 
                <?php
                $req = "SELECT id, name FROM block";
                $stmt = $conn->prepare($req);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                ?> <div class="image-container"> <?php
                foreach ($result as $row):
                $id = $row['id'];
                $name = $row['name'];
                ?>
                <div class="image-name-wrapper">
                    <img class='img' src='assets/img/img_<?php echo $id; ?>.png'>
                    <div class="name"><?php echo $name; ?></div>
                    <button class="more" onclick="openModal()"> See more </button>
                </div>
                <?php endforeach; ?>
            </div>
            </div>

            <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <iframe src="detail.php"></iframe> <!-- Contenu à afficher dans la boîte modale -->
            </div>
            </div>

            <script>
            // Fonction pour ouvrir la boîte modale
            function openModal() {
            document.getElementById("myModal").style.display = "block";
            }

            // Fonction pour fermer la boîte modale
            function closeModal() {
            document.getElementById("myModal").style.display = "none";
            }
            </script>
            <div class="col col-2"> &nbsp; </div>
        </div>
    </div>

    </body>
</html>