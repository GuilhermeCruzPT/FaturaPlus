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
                    <th scope="col">Referência</th>
                    <th scope="col">Data</th>
                    <th scope="col">(€ s/IVA)<br>Valor Total</th>
                    <th scope="col">(€)<br>Iva Total</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Referência Cliente</th>
                    <th scope="col">Ações Disponiveis</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (empty($bills)){
                    echo "<td><td><td><td>"."Ainda não foram inseridos dados"."</td></td></td></td>"."<td><td><td><td></td></td></td></td>";
                }else{
                foreach ($bills as $bill) { ?>

                <td><?= $bill->id ?>
                <td>F<?= $bill->reference?></td>
                <td><?= $bill->date->format('d/m/Y'); ?></td>
                <td><?= $bill->total_value ?>€</td>
                <td><?= $bill->total_iva ?>€</td>
                <td><?= $bill->state == 'l' ? 'Em Lançamento' : 'Emitida' ?></td>
                <td><?= $bill->client_reference->username ?></td>

                <td>
                    <a href="router.php?c=bills&a=show&id=<?= $bill->id ?>"
                       class="btn btn-primary btn-icon-show btn-icon"><i class='bx bx-show-alt bx-tada action-icon' ></i></a>

                    <?php if ($bill->state == 'l') {?>
                    <a href="router.php?c=bills&a=edit&id=<?= $bill->id ?>"
                       class="btn btn-warning btn-icon-update btn-icon"><i class='bx bx-edit-alt bx-tada action-icon' ></i></a>

                    <a href="router.php?c=bills&a=delete&"
                       class="btn-del-bills btn btn-danger btn-icon-delete btn-icon"><i class='bx bx-trash bx-tada action-icon' ></i></a>
                    <?php } ?>
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
<script>

    $('.btn-del-bills').on('click',function (e){
        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: 'Tem a certeza que deseja continuar?',
            text: "Esta ação irá apagar dados nas linhas da fatura Não será possivel voltar atrás!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })

    })

</script>
</body>
</html>