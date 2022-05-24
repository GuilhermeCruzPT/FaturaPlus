<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=products&a=index" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Mostrar Produto</h4><hr><br>

                <div class="form-group">
                    <label for="reference">Referência:</label>
                    <input type="text"
                           class="form-control"
                           id="reference"
                           readonly="true"
                           name="reference"
                           value="<?= $product->reference ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input type="text"
                           class="form-control"
                           id="description"
                           readonly="true"
                           name="description"
                           value="<?= $product->description ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="price">Preço:</label>
                    <input type="text"
                           class="form-control"
                           id="price"
                           readonly="true"
                           name="price"
                           value="<?= $product->price ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="text"
                           class="form-control"
                           id="stock"
                           readonly="true"
                           name="stock"
                           value="<?= $product->stock ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="iva_id">Iva:</label>
                    <input type="text"
                           class="form-control"
                           id="iva_id"
                           readonly="true"
                           name="iva_id"
                           value="<?= $product->iva->percentage . "% - " . $product->iva->description?>">
                </div>

                <br>

                <button type="submit"
                        class="btn btn-primary"
                        name="return">voltar</button>

            </form>
        </div>
    </div>
</section>
</body>
</html>