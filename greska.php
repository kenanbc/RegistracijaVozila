<html>
    <head>
        <meta charset="UTF-8">
        <title>Registracija vozila BiH</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
      </head>
    <body>
    <?php

        if(isset($_COOKIE["user"])){
        ?>

        <div class="container vh-100 d-flex justify-content-center align-items-center">
           <h4>Došlo je do nepoznate greške! Akcija nije izvršena! <a href="./index.php" style="text-decoration:none;">Vrati se nazad</a></h4>
        </div>
        <?php 
        } 
        else echo 
        '<div class="container vh-100 d-flex justify-content-center align-items-center">
            <h4>Niste prijavljeni! <a href = "prijava.php" style = "text-decoration: none;">Prijavi se</a></h4>
        </div>';
        ?>
    </body>
</html>