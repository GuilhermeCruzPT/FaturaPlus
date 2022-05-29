<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=products&a=update&id=<?= $product->id ?>" method="post"
                  style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Editar Produto</h4><hr><br>

                <div class="form-group">
                    <label for="name">Referência:</label>
                    <input type="name"
                           class="form-control"
                           id="reference"
                           name="reference"
                           placeholder="Enter referencia"
                           value="<?= $product->reference ?>">
                </div>

                <?php
                if(isset($product->errors)) {
                    if (is_array($product->errors->on('reference'))) {
                        foreach ($product->errors->on('reference') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $product->errors->on('reference')."</font>";;
                    }
                }

                ?>

                <div class="form-group">
                    <label for="email">Descrição:</label>
                    <input type="text"
                           class="form-control"
                           id="description"
                           name="description"
                           placeholder="Enter descricao"
                           value="<?= $product->description ?>">
                </div>

                <?php
                if(isset($product->errors)) {
                    if (is_array($product->errors->on('description'))) {
                        foreach ($product->errors->on('description') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $product->errors->on('description')."</font>";;
                    }
                }

                ?>

                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="number"
                           class="form-control"
                           id="price"
                           name="price"
                           placeholder="Enter preco"
                           value="<?= $product->price ?>">
                </div>

                <?php
                if(isset($product->errors)) {
                    if (is_array($product->errors->on('price'))) {
                        foreach ($product->errors->on('price') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $product->errors->on('price')."</font>";;
                    }
                }

                ?>

                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number"
                           class="form-control"
                           id="stock"
                           name="stock"
                           placeholder="Enter stock"
                           value="<?= $product->stock ?>">
                </div>

                <?php
                if(isset($product->errors)) {
                    if (is_array($product->errors->on('stock'))) {
                        foreach ($product->errors->on('stock') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $product->errors->on('stock')."</font>";
                    }
                }

                ?>

                <div class="form-group">
                    <label for="preco">Iva:</label>
                    <br>
                    <select name="iva_id">
                        <?php foreach($iva as $ivas){?>
                            <?php if ($ivas->vigour == 1){
                                ?>
                                <option value="<?= $ivas->id?>"> <?= $ivas->percentage . "% - " . $ivas->description;?></option>
                            <?php  }} ?>
                    </select>
                </div>

                <?php
                if(isset($product->errors)) {
                    if (is_array($product->errors->on('iva_id'))) {
                        foreach ($product->errors->on('iva_id') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $product->errors->on('iva_id')."</font>";;
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