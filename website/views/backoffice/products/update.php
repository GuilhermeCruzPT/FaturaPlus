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
                    <label for="reference">Referência:</label>
                    <input type="text"
                           class="form-control"
                           id="reference"
                           name="reference"
                           maxlength="6"
                           placeholder="Inserir Referência"
                           value="<?= $product->reference ?>"
                           onkeydown="return /[a-zA-Z0-9]/i.test(event.key)">
                </div>

                <?php
                if(isset($product->errors)) {
                    if (is_array($product->errors->on('reference'))) {
                        foreach ($product->errors->on('reference') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $product->errors->on('reference') . "</font>";;
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
                           value="<?= $product->title ?>"
                           onkeydown="return /[a-zA-Z0-9 ]/i.test(event.key)">
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
                           value="<?= $product->description ?>">
                </div>

                <?php
                if(isset($product->errors)) {
                    if (is_array($product->errors->on('description'))) {
                        foreach ($product->errors->on('description') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $product->errors->on('description') . "</font>";;
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
                           value="<?= $product->price ?>"
                           oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                </div>

                <?php
                if(isset($product->errors)) {
                    if (is_array($product->errors->on('price'))) {
                        foreach ($product->errors->on('price') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $product->errors->on('price') . "</font>";;
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
                           value="<?= $product->stock ?>"
                           oninput="this.value=this.value.slice(0,this.maxLength)"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                </div>

                <?php
                if(isset($product->errors)) {
                    if (is_array($product->errors->on('stock'))) {
                        foreach ($product->errors->on('stock') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $product->errors->on('stock') . "</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="iva_id">Iva:</label>
                    <select class="form-control" id="iva_id" name="iva_id">
                        <?php foreach($iva as $ivas){?>
                            <?php if ($ivas->vigour == 1){ ?>
                                <option value="<?= $ivas->id?>"> <?= $ivas->percentage . "% - " . $ivas->description;?></option>
                            <?php  }} ?>
                    </select>
                </div>

                <?php
                if(isset($product->errors)) {
                    if (is_array($product->errors->on('iva_id'))) {
                        foreach ($product->errors->on('iva_id') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $product->errors->on('iva_id') . "</font>";;
                    }
                }
                ?>

                <br><br>

                <button type="submit"
                        class="btn btn-primary"
                        name="update">Atualizar</button>

                <button type="button"
                        class="btn btn-primary"
                        name="return"
                        onClick="history.go(-1)">Voltar</button>

            </form>
        </div>
    </div>
</section>
</body>
</html>