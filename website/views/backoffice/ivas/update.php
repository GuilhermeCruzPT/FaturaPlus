<!DOCTYPE html>
<html>
<head>
    <title>Editar Iva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=ivas&a=update&id=<?= $iva->id ?>" method="post"
                  style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Editar Iva</h4><hr><br>

                <div class="form-group">
                    <label for="percentage">Percentagem:</label>
                    <input type="text"
                           class="form-control"
                           id="percentage"
                           name="percentage"
                           placeholder="Inserir Percentagem"
                           value="<?= $iva->percentage ?>">
                </div>

                <?php
                if(isset($iva->errors)) {
                    if (is_array($iva->errors->on('percentage'))) {
                        foreach ($iva->errors->on('percentage') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $iva->errors->on('percentage');
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input type="text"
                           class="form-control"
                           id="description"
                           name="description"
                           placeholder="Inserir Descrição"
                           value="<?= $iva->description ?>">
                </div>

                <?php
                if(isset($iva->errors)) {
                    if (is_array($iva->errors->on('description'))) {
                        foreach ($iva->errors->on('description') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $iva->errors->on('description');
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="vigour">Vigor:</label>
                    <select class="form-control" id="vigour" name="vigour">
                        <option value="1" <?= $iva->vigour == '1' ? 'selected' : '' ?>>Com Vigor</option>
                        <option value="0" <?= $iva->vigour == '0' ? 'selected' : '' ?>>Sem Vigor</option>
                    </select>
                </div>

                <?php
                if(isset($iva->errors)) {
                    if (is_array($iva->errors->on('vigour'))) {
                        foreach ($iva->errors->on('vigour') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $iva->errors->on('vigour');
                    }
                }
                ?>

                <br>

                <button type="submit"
                        class="btn btn-primary"
                        name="update">Atualizar</button>
            </form>
        </div>
    </div>
</section>
</body>
</html>