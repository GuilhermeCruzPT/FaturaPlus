<!DOCTYPE html>
<html>
<head>
    <title>Criar Iva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=ivas&a=save" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Criar Iva</h4><hr><br>

                <div class="form-group">
                    <label for="percentage">Percentagem:</label>
                    <input type="number"
                           class="form-control"
                           id="percentage"
                           name="percentage"
                           maxlength="2"
                           placeholder="Inserir Percentagem"
                           oninput="this.value=this.value.slice(0,this.maxLength)"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
                        <?php
                        if(isset($users->errors)) {?>
                           value="<?php
                           print_r($attributes['percentage']);} ?>">
                </div>

                <?php
                if(isset($ivas->errors)) {
                    if (is_array($ivas->errors->on('percentage'))) {
                        foreach ($ivas->errors->on('percentage') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $ivas->errors->on('percentage') . "</font>";
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
                        <?php
                        if(isset($users->errors)) {?>
                           value="<?php
                           print_r($attributes['description']);} ?>">
                </div>

                <?php
                if(isset($ivas->errors)) {
                    if (is_array($ivas->errors->on('description'))) {
                        foreach ($ivas->errors->on('description') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $ivas->errors->on('description') ."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="vigour">Vigor:</label>
                    <select class="form-control" id="vigour" name="vigour">
                        <option value="2">Nenhum</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>

                <?php
                if(isset($ivas->errors)) {
                    if (is_array($ivas->errors->on('vigour'))) {
                        foreach ($ivas->errors->on('vigour') as $error) {
                            echo "<font color='red'>" . $error ."</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $ivas->errors->on('vigour') . "</font>";
                    }
                }
                ?>

                <br><br>

                <button type="submit"
                        class="btn btn-primary"
                        name="create">Criar</button>

                <a href="router.php?c=ivas&a=index"
                   class=" btn btn-primary btn-back"
                   role="button"
                   aria-pressed="true">Voltar</a>

            </form>
        </div>
    </div>
</section>
</body>
</html>