<html>
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>

<section class="home-section">

        <h4 class="display-4 align-text-top" style="text-indent: 50px; padding-top: 25px;">Bill</h4><br>
        <div class="container">
            <div class="box">

        <form method="post" action="router.php?c=bill&a=index">
            <input type="text" placeholder="Search.." name="search">
            <button name="search_btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <br>
        <table class="table table-striped" style="background: white">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">date</th>
                <th scope="col">total_value</th>
                <th scope="col">total_iva</th>
                <th scope="col">state</th>
                <th scope="col">client_id</th>
                <th scope="col">employee_id</th>
                <th scope="col">acções disponiveis</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($bill

            as $bill) { ?>

            <td><?= $bill->id ?></td>
            <td><?= $bill->date->format('Y-m-d'); ?></td>
            <td><?= $bill->total_value ?></td>
            <td><?= $bill->total_iva ?></td>
            <td><?= $bill->state ?></td>
            <td><?= $bill->client_reference_id ?></td>
            <td><?= $bill->employee_reference_id ?></td>

            <td>
                <a href="router.php?c=bill&a=show&id=<?= $bill->id ?>"
                   class="btn btn-primary">Show</a>

                <a href="router.php?c=bill&a=edit&id=<?= $bill->id ?>"
                   class="btn btn-success">Update</a>

                <a href="router.php?c=bill&a=delete&id=<?= $bill->id ?>"
                   class="btn btn-danger">Delete</a>
            </td>
            </tr>
            </tbody>
            <?php } ?> </table>
        <div class="btn btn-success">
            <a href="router.php?c=bill&a=create" class="btn btn-success">Create</a>
        </div>
    </div>
</div>
</section>
</body>
</html>