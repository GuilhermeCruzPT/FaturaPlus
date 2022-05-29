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

            <h4 class="display-4 align-text-top" style="padding-top: 25px;">Faturas</h4><br>

            <form method="post" action="router.php?c=bills&a=index">
                <input type="text" placeholder="Procurar.." name="search" class="search_bar">
                <button name="search_btn" type="submit" class="search_btn"><i class="fa fa-search"></i></button>
            </form>
            <br>
            <table class="table table-striped" style="background: white">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valor Total</th>
                    <th scope="col">Iva Total</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Referência Cliente</th>
                    <th scope="col">Referência Funcionário</th>
                    <th scope="col">Ações Disponiveis</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (empty($bills)){
                    echo "<td><td><td><td>"."Ainda não foram inseridos dados"."</td></td></td></td>"."<td><td><td><td></td></td></td></td>";
                }else{
                foreach ($bills as $bill) { ?>

                <td><?= $bill->id ?></td>
                <td><?= $bill->date->format('Y-m-d'); ?></td>
                <td><?= $bill->total_value ?></td>
                <td><?= $bill->total_iva ?></td>
                <td><?= $bill->state == 'l' ? 'Em Lançamento' : 'Emitida' ?></td>
                <td><?= $bill->client_reference_id ?></td>
                <td><?= $bill->employee_reference_id ?></td>

                <td>
                    <a href="router.php?c=bills&a=show&id=<?= $bill->id ?>"
                       class="btn btn-primary btn-icon-show btn-icon"><i class='bx bx-show-alt bx-tada action-icon' ></i></a>

                    <a href="router.php?c=bills&a=edit&id=<?= $bill->id ?>"
                       class="btn btn-warning btn-icon-update btn-icon"><i class='bx bx-edit-alt bx-tada action-icon' ></i></a>

                    <a href="router.php?c=bills&a=delete&id=<?= $bill->id ?>"
                       class="btn btn-danger btn-icon-delete btn-icon"><i class='bx bx-trash bx-tada action-icon' ></i></a>
                </td>
                </tr>
                </tbody>
                <?php } }?> </table>
            <div class="btn btn-success">
                <a href="router.php?c=bills&a=create" class="btn btn-success">Criar</a>
            </div>
        </div>
    </div>
</section>
</body>
</html>