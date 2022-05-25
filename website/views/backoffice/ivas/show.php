<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Iva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=ivas&a=index" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Mostrar Iva</h4><hr><br>

                <div class="form-group">
                    <label for="percentage">Percentagem:</label>
                    <input type="text"
                           class="form-control"
                           id="percentage"
                           readonly="true"
                           name="percentage"
                           value="<?= $iva->percentage ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input type="text"
                           class="form-control"
                           id="description"
                           readonly="true"
                           name="description"
                           value="<?= $iva->description ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="vigour">Vigor:</label>
                    <input type="text"
                           class="form-control"
                           id="vigour"
                           readonly="true"
                           name="vigour"
                           value="<?= $iva->vigour == '0' ? 'Inativo' : 'Ativo' ?>">
                </div>

                <br>

                <button type="submit"
                        class="btn btn-primary"
                        name="return">Voltar</button>

            </form>
        </div>
    </div>
</section>
</body>
</html>