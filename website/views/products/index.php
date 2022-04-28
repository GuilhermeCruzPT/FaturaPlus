<?php //require_once './views/layout/header.php'; ?>

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRPAGE ?>public/css/backoffice.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="box">
        <h4 class="display-4 text-center">Products</h4><br>
        <?php
         if (mysqli_num_rows($result)) { ?>
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
                <?php
                $i = 0;
                while($rows = mysqli_fetch_assoc($result)){
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $rows['id_product']?></td>
                        <td><?php echo $rows['referencia']?></td>
                        <td><?php echo $rows['descricao']; ?></td>
                        <td><?php echo $rows['preco'];?></td>
                        <td><?php echo $rows['stock'];?></td>
                        <td><?php echo $rows['vigor'];?></td>
                        <td><a href="route.php?id=<?php echo $rows['id_product']?>"
                               class="btn btn-success">Update</a>

                            <a href="router.php?c=products&a=delete&id_product=<?php echo $rows['id_product']?>"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
        <div class="btn btn-success" >
            <a href="index.php" class="btn btn-success">Create</a>
        </div>
    </div>
</div>
</body>
</html>