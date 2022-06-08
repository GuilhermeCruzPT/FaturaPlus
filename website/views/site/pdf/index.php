<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section-front">
    <div class="container">
        <div class="box">

            <h4 class="display-4 align-text-top" style="padding-top: 25px;">Faturas</h4><br>
            <br>
            <table class="table table-striped" style="background: white">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Referência</th>
                    <th scope="col">Data</th>
                    <th scope="col">(€ s/IVA)<br>Valor Total</th>
                    <th scope="col">(€)<br>Iva Total</th>
                    <th scope="col">Referência Funcionário</th>
                    <th scope="col">Ações Disponiveis</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (empty($bills)){
                    echo "<td><td><td><td>"."Ainda não foram inseridos dados"."</td></td></td></td>"."<td><td><td><td></td></td></td></td>";
                }else{
                foreach ($bills as $bill) {
                    if ($user == $bill->client_reference && $bill->state == 'e') {?>

                <td><?= $bill->id ?>
                <td>F<?= $bill->reference?></td>
                <td><?= $bill->date->format('d/m/Y'); ?></td>
                <td><?= $bill->total_value ?>€</td>
                <td><?= $bill->total_iva ?>€</td>
                <td><?= $bill->employee_reference->username ?></td>

                <td>
                    <a href="router.php?c=site&a=pdfshow&id=<?= $bill->id ?>"
                       class=" btn btn-primary"
                       role="button"
                       aria-pressed="true">Mostrar</a>

                    <a href="router.php?c=site&a=pdftrans&id=<?= $bill->id ?>"
                       class=" btn btn-primary btn-back"
                       role="button"
                       aria-pressed="true">Transferir</a>
                </td>
                </tr>
                </tbody>
                <?php } } }?> </table>
        </div>
    </div>
</section>
</body>
</html>