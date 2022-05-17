
<!DOCTYPE html>
<html >
<head>
    <title >Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRPAGE ?>public/css/backoffice.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="box" style=" margin: 200px;">

    <form action="router.php?c=products&a=save" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

        <h4 class="display-4 text-center">Create</h4><hr><br>

        <?php
       /* if (isset($products)){
        if ($products->errors->on('referencia')) {
            echo "<font color='red'>" . $products->errors->on('referencia') . "</font>";
        }}*/
        ?>

        <div class="form-group">
            <label for="name">referencia</label>
            <input type="name"
                   class="form-control"
                   id="referencia"
                   name="referencia"
                   placeholder="Enter referencia">
        </div>


        <div class="form-group">
            <label for="email">descricao</label>
            <input type="text"
                   class="form-control"
                   id="descricao"
                   name="descricao"
                   placeholder="Enter descricao">
        </div>



        <div class="form-group">
            <label for="preco">preco</label>
            <input type="text"
                   class="form-control"
                   id="preco"
                   name="preco"
                   placeholder="Enter preco">
        </div>



        <div class="form-group">
            <label for="stock">stock</label>
            <input type="text"
                   class="form-control"
                   id="stock"
                   name="stock"
                   placeholder="Enter stock">
        </div>



        <div class="form-group">
            <label for="vigor">vigor</label>
            <input type="text"
                   class="form-control"
                   id="vigor"
                   name="vigor"
                   placeholder="Enter vigor">
        </div>

        <button type="submit"
                class="btn btn-primary"
                name="create">Create</button>
    </form>
</div>
</div>
</body>
</html>