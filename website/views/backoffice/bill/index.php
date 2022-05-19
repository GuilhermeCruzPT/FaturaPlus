<html>
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>


<div class="container">
    <div class="box">
        <h4 class="display-4 align-text-top">Bill</h4><br>

        <form method="post" action="router.php?c=bill&a=index">
            <input type="text" placeholder="Search.." name="search">
            <button name="search_btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <br>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">id_bill</th>
                <th scope="col">date</th>
                <th scope="col">total_value</th>
                <th scope="col">total_iva</th>
                <th scope="col">state</th>
                <th scope="col">client_reference_id</th>
                <th scope="col">employee_reference_id</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($bill

            as $bill) { ?>

            <td><?= $bill->id_bill ?></td>
            <td><?= $bill->date ?></td>
            <td><?= $bill->total_value ?></td>
            <td><?= $bill->total_iva ?></td>
            <td><?= $bill->state ?></td>
            <td><?= $bill->client_reference_id ?></td>
            <td><?= $bill->employee_reference_id ?></td>

            <td>
                <a href="router.php?c=bill&a=show&id_bill=<?= $bill->id_bill ?>"
                   class="btn btn-primary">Show</a>

                <a href="router.php?c=bill&a=edit&id_bill=<?= $bill->id_bill ?>"
                   class="btn btn-success">Update</a>

                <a href="router.php?c=bill&a=delete&id_bill=<?= $bill->id_bill ?>"
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
</body>
</html>