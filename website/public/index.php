<?php

include './../app/config/config.php';
include './../app/libraries/Rota.php';
include './../app/libraries/Controller.php';

//require_once '../config/config.php';
//require_once '../src/vendor/autoload.php';

//echo 'OK';
//echo DIRPAGE;
//echo DIRREQ;

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
    <link href="<?= DIRPAGE ?>public/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        include '../app/views/layout/header.php';
        $rotas = new Rota;
        //$rotas->url();
        include '../app/views/layout/footer.php';
    ?>

    <script src="<?= DIRPAGE ?>public/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>