<html>
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>


<section class="home-section">

    <h4 class="display-4 align-text-top" style="text-indent: 50px; padding-top: 25px;">Users</h4><br>
    <div class="container">
        <div class="box">
            <form  method="post" action="router.php?c=users&a=index" >
                <input type="text" placeholder="Search.." name="search" >
                <button name="search_btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
            <br>
            <table class="table table-striped" style="background: white">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">username</th>
                    <th scope="col">nome</th>
                    <th scope="col">email</th>
                    <th scope="col">género</th>
                    <th scope="col">permissão</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user) { ?>

                <td><?= $user->id?></td>
                <td><?= $user->username?></td>
                <td><?= $user->name ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->genre == 'm' ? 'Masculino' : 'Feminino' ?></td>
                <td><?= $user->role ?></td>
                <td>
                    <a href="router.php?c=users&a=show&id=<?= $user->id ?>"
                       class="btn btn-primary">Mostrar</a>

                    <a href="router.php?c=users&a=edit&id=<?= $user->id ?>"
                       class="btn btn-success">Atualizar</a>

                    <a href="router.php?c=users&a=delete&id=<?= $user->id ?>"
                       class="btn btn-danger">Eliminar</a>
                </td>
                </tr>
                </tbody>
                <?php } ?> </table>
            <div class="btn btn-success" >
                <a href="router.php?c=users&a=create" class="btn btn-success">Create</a>
            </div>
        </div>
    </div>
</section>
</body>
</html>