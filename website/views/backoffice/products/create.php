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
        <div class="box" style=" margin: 200px; background: white;">

            <form action="router.php?c=products&a=save" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Criar Produto</h4><hr><br>

                <div class="form-group">
                    <label for="reference">Referência:</label>
                    <input type="text"
                           class="form-control"
                           id="reference"
                           name="reference"
                           placeholder="Inserir Referência">
                </div>

                <?php
                if(isset($products->errors)) {
                    if (is_array($products->errors->on('reference'))) {
                        foreach ($products->errors->on('reference') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $products->errors->on('reference')."</font>";
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
                           placeholder="Inserir Descrição">
                </div>

                <?php
                if(isset($products->errors)) {
                    if (is_array($products->errors->on('description'))) {
                        foreach ($products->errors->on('description') as $error) {
                            echo "<font color='red'>" .$error ."</font>" . '<br>';
                        }
                    } else {
                        echo "<font color='red'>" .$products->errors->on('description')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="price">Preço</label>

                    <input type="number"
                           class="form-control"
                           id="price"
                           name="price"
                           placeholder="Inserir Preço">
                </div>

                <?php
                if(isset($products->errors)) {
                    if (is_array($products->errors->on('price'))) {
                        foreach ($products->errors->on('price') as $error) {
                            echo "<font color='red'>" .$error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" .$products->errors->on('price')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="stock">Estoque:</label>
                  
                    <input type="number"
                           class="form-control"
                           id="stock"
                           name="stock"
                           placeholder="Inserir Estoque">
                </div>

                <?php
                if(isset($products->errors)) {
                    if (is_array($products->errors->on('stock'))) {
                        foreach ($products->errors->on('stock') as $error) {
                            echo"<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" .$products->errors->on('stock')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <select name="iva_id">
                        <?php foreach($iva as $ivas){?>
                                <?php if ($ivas->vigour == 1){
                                    ?>
                            <option value="<?= $ivas->id?>"> <?= $ivas->percentage . "% - " . $ivas->description;?></option>
                        <?php  }} ?>
                    </select>
                </div>
              
                <?php
                if(isset($products->errors)) {
                    if (is_array($products->errors->on('iva_id'))) {
                        foreach ($products->errors->on('iva_id') as $error) {
                            echo "<font color='red'>". $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>".$products->errors->on('iva_id')."</font>";
                    }
                }
                ?>

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