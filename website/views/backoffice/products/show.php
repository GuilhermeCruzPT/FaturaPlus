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
                           name="reference"
                           value="P<?= $product->reference ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="title">Título:</label>
                    <input type="text"
                           class="form-control"
                           id="title"
                           name="title"
                           value="<?= $product->title ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input type="text"
                           class="form-control"
                           id="description"
                           name="description"
                           value="<?= $product->description ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="price">Preço:</label>
                    <input type="text"
                           class="form-control"
                           id="price"
                           name="price"
                           value="<?= $product->price ?>€" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="text"
                           class="form-control"
                           id="stock"
                           name="stock"
                           value="<?= $product->stock ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="iva_id">Iva:</label>
                    <input type="text"
                           class="form-control"
                           id="iva_id"
                           name="iva_id"
                           value="<?= $product->iva->percentage . "% - " . $product->iva->description?>" disabled>
                </div>

                <br><br>

                <a href="router.php?c=products&a=index"
                   class=" btn btn-primary btn-back"
                   role="button"
                   aria-pressed="true">Voltar</a>

            </form>
        </div>
    </div>
</section>
</body>
</html>