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
                </tr>
                </thead>
                <tbody>
                <?php
                if (empty($bill_lines)){
                    echo "<td><td><td><td>"."Ainda não foram inseridos dados"."</td></td></td></td>"."<td><td></td></td>";
                }else{
                foreach ($bill_lines as $bill_line) { ?>

                <td><?= $bill_line->id ?></td>
                <td><?= $bill_line->quantity ?></td>
                <td><?= $bill_line->unitary_value ?></td>
                <td><?= $bill_line->iva_value ?></td>
                <td><?= $bill_line->product->id . " - " . $bill_line->product->reference ?></td>
                <td><?= $bill_line->bill->id ?></td>

                <td>
                    <a href="router.php?c=lines&a=show&id=<?= $bill_line->id ?>"
                       class="btn btn-primary btn-icon-show btn-icon"><i class='bx bx-show-alt bx-tada action-icon'></i></a>

                    <a href="router.php?c=lines&a=edit&id=<?= $bill_line->id ?>"
                       class="btn btn-warning btn-icon-update btn-icon"><i
                                class='bx bx-edit-alt bx-tada action-icon'></i></a>

                    <a href="router.php?c=lines&a=delete&id=<?= $bill_line->id ?>"
                       class="btn btn-danger btn-icon-delete btn-icon"><i
                                class='bx bx-trash bx-tada action-icon'></i></a>
                </td>
                </tr>
                </tbody>
                <?php }} ?> </table>
            <div class="btn btn-success">
                <a href="router.php?c=lines&a=create" class="btn btn-success">Criar</a>
            </div>
        </div>
    </div>
</section>
</body>
</html>