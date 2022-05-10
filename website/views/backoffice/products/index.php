<html>
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>




    <div class="container">
    <div class="box">
        <h4 class="display-4 align-text-top">Products</h4><br>

        <form  method="post" action="router.php?c=products&a=index" >
            <input type="text" placeholder="Search.." name="search" >
            <button name="search_btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">id_product</th>
                    <th scope="col">referencia</th>
                    <th scope="col">descricao</th>
                    <th scope="col">preco</th>
                    <th scope="col">stock</th>
                    <th scope="col">vigor</th>
                    <th scope="col">acções disponiveis</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product) { ?>

                        <td><?= $product->id_product?></td>
                        <td><?= $product->referencia?></td>
                        <td><?= $product->descricao ?></td>
                        <td><?= $product->preco ?></td>
                        <td><?= $product->stock ?></td>
                        <td><?= $product->vigor ?></td>

                <td>
                    <a href="router.php?c=products&a=show&id_product=<?= $product->id_product ?>"
                       class="btn btn-primary">Show</a>

                    <a href="router.php?c=products&a=edit&id_product=<?= $product->id_product ?>"
                       class="btn btn-success">Update</a>

                    <a href="router.php?c=products&a=delete&id_product=<?= $product->id_product ?>"
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
</body>
</html>