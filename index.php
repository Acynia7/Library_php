<!DOCTYPE html>
<html>
    <head>
        <title> Index </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets\style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
    <div class="container-fluid">
        <div class="row" id="top">
            <div class="col col-2"> &nbsp; </div>
            <div class="col text-left bg-white"> 
                <a class="navbar-brand" href="index.php"> <img class="logo" src="assets/logo.jpg" style="object-fit: contain; margin-right: 0.3em"> </a>
                <a class="conn" href="login.php">Connect as an admin</a>
            </div>
            <div class="col col-2"> &nbsp; </div>
        </div>

        <div class="row">
            <div class="col col-2"> &nbsp; </div>
            <div class="col col-8 text-center bg-secondary-subtle text-right"> 
                <?php

                include ('includes/db.php');
                $conn = connect();

                if(isset($_GET['page']) && !empty($_GET['page'])){
                    $currentPage = (int) strip_tags($_GET['page']);
                }else{
                    $currentPage = 1;
                }

                $itemsPerPage= 10;

                $reqTotalItems = "SELECT COUNT(*) AS total FROM block";
                $stmtTotalItems = $conn->prepare($reqTotalItems);
                $stmtTotalItems->execute();
                $resultTotalItems = $stmtTotalItems->fetch(PDO::FETCH_ASSOC);
                $totalItems = $resultTotalItems['total'];
                
                // Calculer le nombre total de pages
                $pages = ceil($totalItems / $itemsPerPage);
                
                // Calculer l'offset pour la requête SQL
                $offset = ($currentPage - 1) * $itemsPerPage;

                $reqItems = "SELECT id, name FROM block LIMIT $offset, $itemsPerPage";
                $stmtItems = $conn->prepare($reqItems);
                $stmtItems->execute();
                $items = $stmtItems->fetchAll(PDO::FETCH_ASSOC);

                ?> <div class="image-container"> <?php
                foreach ($items as $row):
                $id = $row['id'];
                $name = $row['name'];
                ?>
                <div class="image-name-wrapper">
                    <img class='img' src='assets/img/img_<?php echo $id; ?>.png'>
                    <div class="name"><?php echo $name; ?></div>
                    <button class="btn btn-secondary" onclick="openModal(<?php echo $id; ?>)"> See more </button>
                </div>
                <?php endforeach; ?>
            </div>
            </div>

        <div class="col col-2"> &nbsp; </div>
        </div>
        
        <div class="row">
            <div class="col col-2"> &nbsp; </div>
            <div class="col col-8 text-center bg-secondary-subtle text-right">
                <nav aria-label="Page navigation exemple">
                    <ul class="pagination justify-content-center">
                        <!-- Page précédente -->
                        <?php
                        if ($currentPage > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>">&lsaquo;</a>
                        </li>
                        <?php endif; ?>
     
                        <!-- Première page -->
                        <?php if ($currentPage > 2): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=1">1</a>
                        </li>
                        <?php elseif ($currentPage == 2): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=1">1</a>
                        </li>
                        <?php endif; ?>
     
                        <!-- Page précédente -->
                        <?php if ($currentPage > 2): ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">...</a>
                        </li>
                        <?php endif; ?>
                        <!-- Page actuelle -->
                        <li class="page-item active">
                            <a class="page-link" href="#"><?php echo $currentPage; ?></a>
                        </li>
     
                        <!-- Page suivante -->
                        <?php if ($currentPage < $pages - 1): ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">...</a>
                        </li>
                        <?php endif; ?>
     
                        <!-- Dernière page -->
                        <?php if ($currentPage < $pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $pages; ?>"><?php echo $pages; ?></a>
                        </li>
                        <?php endif; ?>
     
                        <!-- Page suivante -->
                        <?php if ($currentPage < $pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>">&rsaquo;</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
            <div class="col col-2"> &nbsp; </div>
        </div>
    </div>
                            
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <iframe id="iframeDetail" src=""></iframe> <!-- Contenu à afficher dans la boîte modale -->
        </div>
    </div>

    <script>
        // Fonction pour ouvrir la boîte modale avec l'ID du block
        function openModal(id) {
            document.getElementById("myModal").style.display = "block";
            document.getElementById("iframeDetail").src = "detail.php?id=" + id;
        }

        // Fonction pour fermer la boîte modale
        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }
    </script>
    </body>
</html>
