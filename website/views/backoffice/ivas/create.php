<!DOCTYPE html>
<html>
<head>
    <title >Criar Iva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style=" margin: 200px; background: white;">

            <form action="router.php?c=ivas&a=save" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Criar Iva</h4><hr><br>

                <?php
                /* if (isset($products)){
                 if ($products->errors->on('referencia')) {
                     echo "<font color='red'>" . $products->errors->on('referencia') . "</font>";
                 }}*/
                ?>

                <div class="form-group">
                    <label for="percentage">Percentagem:</label>
                    <input type="text"
                           class="form-control"
                           id="percentage"
                           name="percentage"
                           placeholder="Inserir Percentagem">
                </div>

                <br>

                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input type="text"
                           class="form-control"
                           id="description"
                           name="description"
                           placeholder="Inserir Descrição">
                </div>

                <br>

                <div class="form-group">
                    <label for="vigour">Vigor:</label>
                    <select class="form-control" id="vigour" name="vigour">
                        <option value="1">Com Vigor</option>
                        <option value="0">Sem Vigor</option>
                    </select>
                </div>

                <br>

                <button type="submit"
                        class="btn btn-primary"
                        name="create">Criar</button>
            </form>
        </div>
    </div>
</section>
</body>
</html>