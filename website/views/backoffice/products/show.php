<!DOCTYPE html>
<html>
<head>
    <title>Show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRPAGE ?>public/css/backoffice.css" rel="stylesheet">
</head>

<section class="home-section">
<body>
<div class="container">
    <div class="box" style=" margin: 200px; background: white;">

            <form action="router.php?c=products&a=index" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Show</h4><hr><br>

                <div class="form-group">
                    <label for="reference">referencia</label>
                    <input type="name"
                           class="form-control"
                           id="reference"
                           name="reference"
                           value="<?= $product->reference ?>">
                </div>

                <div class="form-group">
                    <label for="email">descricao</label>
                    <input type="text"
                           class="form-control"
                           id="description"
                           name="description"
                           value="<?= $product->description ?>">
                </div>

                <div class="form-group">
                    <label for="preco">preco</label>
                    <input type="text"
                           class="form-control"
                           id="price"
                           name="price"
                           value="<?= $product->price ?>">
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
                    <label for="vigor">iva_id</label>
                    <input type="text"
                           class="form-control"
                           id="iva_id"
                           name="iva_id"
                           value="<?= $product->iva_id ?>">
                </div>
                <br>
                <button type="submit"
                        class="btn btn-primary"
                        name="return">voltar</button>

            </form>
    </div>
</div>
</body>
</section>
</html>