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

            <h4 class="display-4 align-text-top" style="padding-top: 25px;">Empresas</h4><br>

            <form method="post" action="router.php?c=enterprises&a=index">
                <input type="text" placeholder="Procurar.." name="search" class="search_bar">
                <button name="search_btn" type="submit" class="search_btn"><i class="fa fa-search"></i></button>
            </form>
            <br>
            <table class="table table-striped" style="background: white">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Designação Social</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telemóvel</th>
                    <th scope="col">País</th>
                    <th scope="col">Capital Social</th>
                    <th scope="col">Ações Disponiveis</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (empty($enterprises)){
                    echo "<td><td><td><td>"."Ainda não foram inseridos dados"."</td></td></td></td>"."<td><td><td></td></td></td>";
                }else{
                foreach ($enterprises as $enterprise) { ?>

                <td><?= $enterprise->id ?></td>
                <td><?= $enterprise->social_designation ?></td>
                <td><?= $enterprise->email ?></td>
                <td><?= $enterprise->phone ?></td>
                <td><?= $enterprise->country ?></td>
                <td><?= $enterprise->social_capital ?>€</td>

                <td>
                    <a href="router.php?c=enterprises&a=show&id=<?= $enterprise->id ?>"
                       class="btn btn-primary btn-icon-show btn-icon"><i class='bx bx-show-alt bx-tada action-icon' ></i></a>

                    <a href="router.php?c=enterprises&a=edit&id=<?= $enterprise->id ?>"
                       class="btn btn-warning btn-icon-update btn-icon"><i class='bx bx-edit-alt bx-tada action-icon' ></i></a>
                </td>
                </tr>
                </tbody>
                <?php }} ?> </table>
        </div>
    </div>
</section>
</body>
</html>