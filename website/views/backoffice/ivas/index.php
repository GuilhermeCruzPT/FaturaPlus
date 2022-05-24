<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <h4 class="display-4 align-text-top" style="text-indent: 50px; padding-top: 25px;">Iva</h4><br>
    <div class="container">
        <div class="box">
            <form  method="post" action="router.php?c=ivas&a=index" >
                <input type="text" placeholder="Search.." name="search" >
                <button name="search_btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
            <br>
            <table class="table table-striped" style="background: white">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Percentagem</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Vigor</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ivas as $iva) { ?>

                <td><?= $iva->id?></td>
                <td><?= $iva->percentage?></td>
                <td><?= $iva->description ?></td>
                <td><?= $iva->vigour ?></td>
                <td>
                    <a href="router.php?c=ivas&a=show&id=<?= $iva->id ?>"
                       class="btn btn-primary">Mostrar</a>

                    <a href="router.php?c=ivas&a=edit&id=<?= $iva->id ?>"
                       class="btn btn-success">Atualizar</a>

                    <a href="router.php?c=ivas&a=delete&id=<?= $iva->id ?>"
                       class="btn btn-danger">Eliminar</a>
                </td>
                </tr>
                </tbody>
                <?php } ?> </table>
            <div class="btn btn-success" >
                <a href="router.php?c=ivas&a=create" class="btn btn-success">Create</a>
            </div>
        </div>
    </div>
</section>
</body>
</html>