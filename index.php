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
                    <div class="col col-8 text-center bg-secondary-subtle text-right"> <a href="login.php">Connect as an admin</a> </div>
                    <div class="col col-2"> &nbsp; </div>
            </div>
        </div>
    </body>
    
</html>