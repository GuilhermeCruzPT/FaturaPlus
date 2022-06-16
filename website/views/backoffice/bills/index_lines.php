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

            <h4 class="display-4 align-text-top" style="padding-top: 25px;">Linhas das Faturas</h4><br>

            <form method="post" action="router.php?c=lines&a=index">
                <input type="text" placeholder="Procurar.." name="search" class="search_bar">
                <button name="search_btn" type="submit" class="search_btn"><i class="fa fa-search"></i></button>
            </form>
            <br>
            <table class="table table-striped" style="background: white">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor Unitário</th>
                    <th scope="col">Valor do Iva</th>
                    <th scope="col">Referência Produto</th>
                    <th scope="col">Referência Fatura</th>
                    <th scope="col">Ações Disponiveis</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (empty($bill_lines)){
                    echo "<td><td><td><td>"."Ainda não foram inseridos dados"."</td></td></td></td>"."<td><td></td></td>";
                }else{
                foreach ($bill_lines as $bill_line) { ?>

                <td><?= $bill_line->id ?></td>
                <td>Q x <?= $bill_line->quantity ?></td>
                <td><?= $bill_line->unitary_value ?>€</td>
                <td><?= $bill_line->iva_value ?>€</td>
                <td>P<?= $bill_line->product->reference ?></td>
                <td>F<?= $bill_line->bill->reference ?></td>

                <td>

                    <?php if ($bill_line->bill_id == $bill_line->bill->id && $bill_line->bill->state == 'l') {?>
                        <a href="router.php?c=bills&a=edit_lines&id=<?= $bill_line->id ?>"
                           class="btn btn-warning btn-icon-update btn-icon"><i class='bx bx-edit-alt bx-tada action-icon'></i></a>

                        <a href="router.php?c=bills&a=delete_lines&id=<?= $bill_line->id ?>"
                           class="btn-del-lines btn btn-danger btn-icon-delete btn-icon"><i class='bx bx-trash bx-tada action-icon'></i></a>
                    <?php } ?>

                </td>
                <script src="<?= DIRJS ?>Delete_message.js"></script>
                </tr>
                </tbody>
                <?php }} ?> </table>
            <div class="btn btn-success">
                <a href="router.php?c=bills&a=create_lines&id=<?= $bill_line->id ?>" class="btn btn-success">Criar</a>
            </div>
        </div>
    </div>
</section>
</body>
</html>