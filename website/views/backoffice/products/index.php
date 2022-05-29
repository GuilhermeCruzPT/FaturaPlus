<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box">

            <h4 class="display-4 align-text-top" style="padding-top: 25px;">Productos</h4><br>

            <form  method="post" action="router.php?c=products&a=index">
                <input type="text" placeholder="Procurar.." name="search" class="search_bar">
                <button name="search_btn" type="submit" class="search_btn"><i class="fa fa-search"></i></button>
            </form>
            <br>
            <table class="table table-striped" style="background: white">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Referência</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Iva</th>
                    <th scope="col">Ações Disponiveis</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (empty($products)){
                    echo "<td><td><td><td>"."Ainda não foram inseridos dados"."</td></td></td></td>"."<td><td><td></td></td></td>";
                }else{
                foreach ($products as $product) {
                    ?>


                <td><?= $product->id?></td>
                <td><?= $product->reference?></td>
                <td><?= $product->description ?></td>
                <td><?= $product->price ?></td>
                <td><?= $product->stock ?></td>
                <td><?= $product->iva->percentage . "% - " . $product->iva->description ?></td>
                <td>
                    <a href="router.php?c=products&a=show&id=<?= $product->id ?>"
                       class="btn btn-primary btn-icon-show btn-icon"><i class='bx bx-show-alt bx-tada action-icon' ></i></a>

                    <a href="router.php?c=products&a=edit&id=<?= $product->id ?>"
                       class="btn btn-warning btn-icon-update btn-icon"><i class='bx bx-edit-alt bx-tada action-icon' ></i></a>

                    <a href="router.php?c=products&a=delete&id=<?= $product->id ?>"
                       class="btn btn-danger btn-icon-delete btn-icon"><i class='bx bx-trash bx-tada action-icon' ></i></a>
                </td>
                </tr>
                </tbody>
                <?php } }?> </table>
            <div class="btn btn-success" >
                <a href="router.php?c=products&a=create" class="btn btn-success">Criar</a>
            </div>
        </div>
    </div>
</section>
</body>
</html>