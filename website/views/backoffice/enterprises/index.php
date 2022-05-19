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
                <th scope="col">id</th>
                <th scope="col">social_designation</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">nif</th>
                <th scope="col">postal_code</th>
                <th scope="col">country</th>
                <th scope="col">city</th>
                <th scope="col">locale</th>
                <th scope="col">address</th>
                <th scope="col">social_capital</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($enterprises

            as $enterprises) { ?>

            <td><?= $enterprises->id ?></td>
            <td><?= $enterprises->social_designation ?></td>
            <td><?= $enterprises->email ?></td>
            <td><?= $enterprises->phone ?></td>
            <td><?= $enterprises->nif ?></td>
            <td><?= $enterprises->postal_code ?></td>
            <td><?= $enterprises->country ?></td>
            <td><?= $enterprises->city ?></td>
            <td><?= $enterprises->locale ?></td>
            <td><?= $enterprises->address ?></td>
            <td><?= $enterprises->social_capital ?></td>

            <td>
                <a href="router.php?c=bill&a=show&id_bill=<?= $enterprises->id ?>"
                   class="btn btn-primary">Show</a>

                <a href="router.php?c=bill&a=edit&id_bill=<?= $enterprises->id ?>"
                   class="btn btn-success">Update</a>

                <a href="router.php?c=bill&a=delete&id_bill=<?= $enterprises->id ?>"
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