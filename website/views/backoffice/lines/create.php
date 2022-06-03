<!DOCTYPE html>
<html>
<head>
    <title>Criar Fatura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=lines&a=save" method="post" style="
            width: 1000px;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Criar Linha da Fatura</h4>
                <hr>
                <br>

                <div class="form-group">
                    <label for="quantity">Quantidade:</label>
                    <input type="number"
                           class="form-control"
                           id="quantity"
                           name="quantity"
                           placeholder="Inserir Quantidade"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                </div>

                <?php

                if (isset($bill_lines->errors)) {
                    if (is_array($bill_lines->errors->on('quantity'))) {
                        foreach ($bill_lines->errors->on('quantity') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bill_lines->errors->on('quantity') . "</font>";
                    }
                }
                ?>

                <br>

                <!--<div class="form-group">
                    <label for="unitary_value">Valor Unitário:</label>
                    <input type="number"
                           class="form-control"
                           id="unitary_value"
                           name="unitary_value"
                           placeholder="Inserir Valor Total">
                </div>

                <?php
/*                if (isset($bill_lines->errors)) {
                    if (is_array($bill_lines->errors->on('unitary_value'))) {
                        foreach ($bill_lines->errors->on('unitary_value') as $error) {
                            echo "<font color='red'>" . $error . "</font>" . '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $bill_lines->errors->on('unitary_value') . "</font>";
                    }
                }
                */?>

                <br>

                <div class="form-group">
                    <label for="iva_value">Iva:</label>
                    <input type="number"
                           class="form-control"
                           id="iva_value"
                           name="iva_value"
                           placeholder="Inserir Iva">
                </div>

                --><?php
/*                if (isset($bill_lines->errors)) {
                    if (is_array($bill_lines->errors->on('iva_value'))) {
                        foreach ($bill_lines->errors->on('iva_value') as $error) {
                            echo "<font color='red'>" . $error . "</font>" . '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $bill_lines->errors->on('iva_value') . "</font>";
                    }
                }
                */?>

                <div class="form-group">
                    <label for="product_id">Referência Produto:</label>
                    <select class="form-control" id="product_id" name="product_id">
                        <option value="0">Nenhum</option>
                        <?php foreach ($products as $product) { ?>
                            <option value="<?= $product->id ?>">  <?= $product->reference . ' - ' . $product->title ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <?php
                if (isset($bill_lines->errors)) {
                    if (is_array($bill_lines->errors->on('product_id'))) {
                        foreach ($bill_lines->errors->on('product_id') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bill_lines->errors->on('product_id') . "</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="bill_id"> Referência Fatura:</label>
                    <select class="form-control" id="bill_id" name="bill_id">
                        <option value="0">Nenhum</option>
                        <?php foreach ($bills as $bill) { ?>
                            <option value="<?= $bill->id ?>">  <?= $bill->id ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <?php
                if (isset($bill_lines->errors)) {
                    if (is_array($bill_lines->errors->on('bill_id'))) {
                        foreach ($bill_lines->errors->on('bill_id') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bill_lines->errors->on('bill_id') . "</font>";
                    }
                }
                ?>

                <br><br>

                <button type="submit"
                        class="btn btn-primary"
                        name="create">Criar</button>

                <a href="router.php?c=lines&a=index"
                   class=" btn btn-primary btn-back"
                   role="button"
                   aria-pressed="true">Voltar</a>

            </form>
        </div>
    </div>
</section>
</body>
</html>