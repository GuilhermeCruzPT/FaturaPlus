<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box">

            <h4 class="display-4 align-text-top" style="padding-top: 25px;">Users</h4><br>

            <form  method="post" action="router.php?c=users&a=index">
                <input type="text" placeholder="Procurar.." name="search" class="search_bar">
                <button name="search_btn" type="submit" class="search_btn"><i class="fa fa-search"></i></button>
            </form>
            <br>
            <table class="table table-striped" style="background: white">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Género</th>
                    <th scope="col">Permissão</th>
                    <th scope="col">Ações Disponiveis</th>
                </tr>
                </thead>
                <tbody>
                <?php

                if (empty($users)){
                    echo "<td><td><td><td>"."Ainda não foram inseridos dados"."</td></td></td></td>"."<td><td><td></td></td></td>";
                }else{

                foreach ($users as $user) { ?>

                <td><?= $user->id?></td>
                <td><?= $user->username?></td>
                <td><?= $user->name ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->genre == 'm' ? 'Masculino' : 'Feminino' ?></td>
                <td><?php if ($user->role == 'c') { echo 'Cliente'; } else if ($user->role == 'f') { echo 'Funcionário'; } else { echo 'Administrador'; } ?></td>

                <td>
                    <a href="router.php?c=users&a=show&id=<?= $user->id ?>"
                       class="btn btn-primary btn-icon-show btn-icon"><i class='bx bx-show-alt bx-tada action-icon' ></i></a>

                    <?php if ($_SESSION["permission"] == 'a' || $user->role == 'c' || $user->username == $_SESSION["username"]) { ?>
                    <a href="router.php?c=users&a=edit&id=<?= $user->id ?>"
                       class="btn btn-warning btn-icon-update btn-icon"><i class='bx bx-edit-alt bx-tada action-icon' ></i></a>
                    <?php if ($user->username != $_SESSION["username"]) { ?>
                    <a href="router.php?c=users&a=delete&id=<?= $user->id ?>"
                       class="btn-del-users btn btn-danger btn-icon-delete btn-icon"><i class='bx bx-trash bx-tada action-icon' ></i></a>
                    <?php } } ?>
                </td>
                <script src="<?= DIRJS ?>Delete_message.js"></script>
                </tr>
                </tbody>
                <?php }} ?> </table>
            <div class="btn btn-success" >
                <a href="router.php?c=users&a=create" class="btn btn-success">Criar</a>
            </div>
        </div>
    </div>
</section>

</body>
</html>