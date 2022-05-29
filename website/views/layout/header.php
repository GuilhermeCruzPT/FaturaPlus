<?php
    /*if (isset($_SESSION["user_id"])) {
        if ($_SESSION["permission"] != 'c')
            header('Location: router.php?c=users&a=index');
    }*/
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRPAGE ?>public/css/style.css" rel="stylesheet">
</head>
<body>
<header class="bg-dark p-3 text-light">
    <div class="">
        <nav class="navbar navbar-expand-sm navbar-dark">
            <a class="navbar-brand" href="<?= DIRPAGE ?>">
                <img src="<?= DIRIMG ?>FaturaPlus_Logo_Oficial.png" class="d-inline-block align-top nav-logo" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="#navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= DIRPAGE ?>" data-tooltip="tooltip" title="Pagina inicial">Pagina inicial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-tooltip="tooltip" title="Sobre nós">Sobre nós</a>
                    </li>
                </ul>

            </div>
            <div class="header-right">
                <!--<a class="custom-btn btn-5" href="#" data-tooltip="tooltip" title="Não tens uma conta? Regista-te">Registar</a>
                <a class="btn btn-info" href="#" data-tooltip="tooltip" title="Tem uma conta? Faça login">Entrar</a>-->
                <?php if (!isset($_SESSION["user_id"])) { ?>
                <div class="split-buttons">
                    <a class="btn-box-auth btn-primary-auth btn-reflex" href="router.php?c=auth&a=signup">Registar</a>
                    <a class="btn-box-auth btn-secondary-auth btn-reflex" href="router.php?c=auth&a=signin">Entrar</a>
                    <span>ou</span>
                </div>
                <?php } else { $user = User::find([$_SESSION["user_id"]]);?>
                    <div class="dropdown">
                        <button class="dropbtn green-effect"><?= $userName ?>
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content white-effect">
                            <a href="#">Faturas</a>
                            <a href="#">Perfil</a>
                            <a href="router.php?c=auth&a=logout">Logout</a>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </nav>
    </div>
</header>