<html>
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>


<section class="home-section">

        <h4 class="display-4 align-text-top" style="text-indent: 50px; padding-top: 25px;">Productos</h4><br>
        <div class="container">
            <div class="box">
        <form  method="post" action="router.php?c=product&a=index" >
            <input type="text" placeholder="Search.." name="search" >
            <button name="search_btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <br>
            <table class="table table-striped" style="background: white">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">referencia</th>
                    <th scope="col">descricao</th>
                    <th scope="col">preco</th>
                    <th scope="col">stock</th>
                    <th scope="col">iva_id</th>
                    <th scope="col">acções disponiveis</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product) { ?>

                        <td><?= $product->id?></td>
                        <td><?= $product->reference?></td>
                        <td><?= $product->description ?></td>
                        <td><?= $product->price ?></td>
                        <td><?= $product->stock ?></td>
                        <td><?= $product->iva->description ?></td>
                <td>
                    <a href="router.php?c=products&a=show&id=<?= $product->id ?>"
                       class="btn btn-primary">Show</a>

                    <a href="router.php?c=products&a=edit&id=<?= $product->id ?>"
                       class="btn btn-success">Update</a>

                    <a href="router.php?c=products&a=delete&id=<?= $product->id ?>"
                       class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
                <?php } ?> </table>
        <div class="btn btn-success" >
            <a href="router.php?c=products&a=create" class="btn btn-success">Create</a>
        </div>
    </div>
</div>
</section>
</body>
</html>