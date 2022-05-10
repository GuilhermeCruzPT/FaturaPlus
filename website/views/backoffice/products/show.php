<!DOCTYPE html>
<html>
<head>
    <title>Show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRPAGE ?>public/css/backoffice.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="box" style=" margin: 200px;">

            <form action="router.php?c=products&a=index" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Show</h4><hr><br>

                <div class="form-group">
                    <label for="name">referencia</label>
                    <input type="name"
                           class="form-control"
                           id="referencia"
                           name="referencia"
                           value="<?= $product->referencia ?>">
                </div>

                <div class="form-group">
                    <label for="email">descricao</label>
                    <input type="text"
                           class="form-control"
                           id="descricao"
                           name="descricao"
                           value="<?= $product->descricao ?>">
                </div>

                <div class="form-group">
                    <label for="preco">preco</label>
                    <input type="text"
                           class="form-control"
                           id="preco"
                           name="preco"
                           value="<?= $product->preco ?>">
                </div>
                <div class="form-group">
                    <label for="preco">stock</label>
                    <input type="text"
                           class="form-control"
                           id="stock"
                           name="stock"
                           value="<?= $product->stock ?>">
                </div>

                <div class="form-group">
                    <label for="vigor">vigor</label>
                    <input type="text"
                           class="form-control"
                           id="vigor"
                           name="vigor"
                           value="<?= $product->vigor ?>">
                </div>
                <br>
                <button type="submit"
                        class="btn btn-primary"
                        name="return">voltar</button>

            </form>
    </div>
</div>
</body>
</html>