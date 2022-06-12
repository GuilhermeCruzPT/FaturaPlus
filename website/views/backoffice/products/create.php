<!DOCTYPE html>
<html>
<head>
    <title>Criar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=products&a=save" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Criar Produto</h4><hr><br>

                <div class="form-group">
                    <label for="reference">Referência:</label>
                    <input type="number"
                           class="form-control"
                           id="reference"
                           name="reference"
                           maxlength="6"
                           placeholder="Inserir Referência"
                           oninput="this.value=this.value.slice(0,this.maxLength)"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
                        <?php
                        if(isset($products->errors)) {?>
                           value="<?php
                           print_r($attributes['reference']);} ?>">
                </div>

                <?php
                if(isset($products->errors)) {
                    if (is_array($products->errors->on('reference'))) {
                        foreach ($products->errors->on('reference') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $products->errors->on('reference') . "</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="title">Título:</label>
                    <input type="text"
                           class="form-control"
                           id="title"
                           name="title"
                           placeholder="Inserir Título"
                           onkeydown="return /[a-zA-Z ]/i.test(event.key)"
                        <?php
                        if(isset($products->errors)) {?>
                           value="<?php
                           print_r($attributes['title']);} ?>">
                </div>

                <?php
                if(isset($products->errors)) {
                    if (is_array($products->errors->on('title'))) {
                        foreach ($products->errors->on('title') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $products->errors->on('title') . "</font>";
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
                        if(isset($products->errors)) {?>
                           value="<?php
                           print_r($attributes['description']);} ?>">
                </div>

                <?php
                if(isset($products->errors)) {
                    if (is_array($products->errors->on('description'))) {
                        foreach ($products->errors->on('description') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $products->errors->on('description') . "</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="price">Preço:</label>
                    <input type="text"
                           class="form-control"
                           id="price"
                           name="price"
                           placeholder="Inserir Preço"
                           maxlength="14"
                           oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                        <?php
                        if(isset($products->errors)) {?>
                           value="<?php
                           print_r($attributes['price']);} ?>">
                </div>

                <?php
                if(isset($products->errors)) {
                    if (is_array($products->errors->on('price'))) {
                        foreach ($products->errors->on('price') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $products->errors->on('price') . "</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number"
                           class="form-control"
                           id="stock"
                           name="stock"
                           placeholder="Inserir Stock"
                           maxlength="6"
                           oninput="this.value=this.value.slice(0,this.maxLength)"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
                        <?php
                        if(isset($products->errors)) {?>
                           value="<?php
                           print_r($attributes['stock']);} ?>">
                </div>

                <?php
                if(isset($products->errors)) {
                    if (is_array($products->errors->on('stock'))) {
                        foreach ($products->errors->on('stock') as $error) {
                            echo"<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $products->errors->on('stock') . "</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="iva_id">Iva:</label>
                    <select class="form-control" id="iva_id" name="iva_id">
                        <option value="0">Nenhum</option>
                        <?php foreach($iva as $ivas){?>
                                <?php if ($ivas->vigour == 1){ ?>
                            <option value="<?= $ivas->id?>"> <?= $ivas->percentage . "% - " . $ivas->description;?></option>
                        <?php  }} ?>
                    </select>
                </div>
              
                <?php
                if(isset($products->errors)) {
                    if (is_array($products->errors->on('iva_id'))) {
                        foreach ($products->errors->on('iva_id') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $products->errors->on('iva_id') . "</font>";
                    }
                }
                ?>

                <br><br>

                <button type="submit"
                        class="btn btn-primary"
                        name="create">Criar</button>

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