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

            <h4 class="display-4 align-text-top" style="padding-top: 25px;">Iva</h4><br>

            <form  method="post" action="router.php?c=ivas&a=index">
                <input type="text" placeholder="Procurar.." name="search" class="search_bar">
                <button name="search_btn" type="submit" class="search_btn"><i class="fa fa-search"></i></button>
            </form>
            <br>
            <table class="table table-striped" style="background: white">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Percentagem</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Vigor</th>
                    <th scope="col">Ações Disponiveis</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (empty($ivas)){
                    echo "<td><td><td><td>"."Ainda não foram inseridos dados"."</td></td></td></td>"."<td></td>";
                }else{
                foreach ($ivas as $iva) { ?>

                <td><?= $iva->id?></td>
                <td><?= $iva->percentage?>%</td>
                <td><?= $iva->description ?></td>
                <td><?= $iva->vigour == '0' ? 'Inativo' : 'Ativo' ?></td>
                <td>
                    <a href="router.php?c=ivas&a=show&id=<?= $iva->id ?>"
                       class="btn btn-primary btn-icon-show btn-icon"><i class='bx bx-show-alt bx-tada action-icon' ></i></a>

                    <a href="router.php?c=ivas&a=edit&id=<?= $iva->id ?>"
                       class="btn btn-warning btn-icon-update btn-icon"><i class='bx bx-edit-alt bx-tada action-icon' ></i></a>

                    <a href="router.php?c=ivas&a=delete&id=<?= $iva->id ?>"
                       class="btn-del-ivas btn btn-danger btn-icon-delete btn-icon"><i class='bx bx-trash bx-tada action-icon' ></i></a>
                </td>
                </tr>
                </tbody>
                <?php } }?> </table>
            <div class="btn btn-success" >
                <a href="router.php?c=ivas&a=create" class="btn btn-success">Criar</a>
            </div>
        </div>
    </div>
</section>
<script>

    $('.btn-del-ivas').on('click',function (e){
        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: 'Tem a certeza que deseja continuar?',
            text: "Esta ação irá apagar dados nas linhas da fatura e nos produtos. Não será possivel voltar atrás!",
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