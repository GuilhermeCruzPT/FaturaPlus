<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRPAGE ?>public/css/backoffice.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="box">

        <table class="table table-striped">
    <form action="router.php?c=products&a=save" method="post">

        <h4 class="display-4 text-center">Create</h4><hr><br>

        <div class="form-group">
            <label for="name">referencia</label>
            <input type="name"
                   class="form-control"
                   id="referencia"
                   name="referencia"
                   value="<?php if(isset($_GET['referencia']))
                       echo($_GET['referencia']); ?>"
                   placeholder="Enter referencia">
        </div>

        <div class="form-group">
            <label for="email">descricao</label>
            <input type="text"
                   class="form-control"
                   id="descricao"
                   name="descricao"
                   value="<?php if(isset($_GET['descricao']))
                       echo($_GET['descricao']); ?>"
                   placeholder="Enter descricao">
        </div>

        <div class="form-group">
            <label for="preco">preco</label>
            <input type="text"
                   class="form-control"
                   id="preco"
                   name="preco"
                   value="<?php if(isset($_GET['preco']))
                       echo($_GET['preco']); ?>"
                   placeholder="Enter preco">
        </div>
        <div class="form-group">
            <label for="preco">stock</label>
            <input type="text"
                   class="form-control"
                   id="stock"
                   name="stock"
                   value="<?php if(isset($_GET['stock']))
                       echo($_GET['stock']); ?>"
                   placeholder="Enter stock">
        </div>

        <div class="form-group">
            <label for="vigor">vigor</label>
            <input type="text"
                   class="form-control"
                   id="vigor"
                   name="vigor"
                   value="<?php if(isset($_GET['vigor']))
                       echo($_GET['vigor']); ?>"
                   placeholder="Enter vigor">
        </div>

        <button type="submit"
                class="btn btn-primary"
                name="create">Create</button>
    </form>
        </table>
</div>
</div>
</body>
</html>