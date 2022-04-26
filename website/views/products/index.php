<?php require_once './views/layout/header.php'; ?>

<html>
<head>
    <title>Create</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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
                        <td><a href="update.php?id=<?php echo $rows['id_product']?>"
                               class="btn btn-success">Update</a>

                            <a href="php/delete.php?id=<?php echo $rows['id_product']?>"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
        <div class="btn btn-success" >
            <a href="index.php" class="link-primary">Create</a>
        </div>
    </div>
</div>
</body>
</html>