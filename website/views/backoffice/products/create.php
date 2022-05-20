<!DOCTYPE html>
<html >
<head>
    <style></style>
    <title>Criar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>public/css/backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style=" margin: 200px; background: white;">

            <form action="router.php?c=products&a=save" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Create</h4><hr><br>

                <div class="form-group">
                    <label for="name">reference</label>
                    <input type="name"
                           class="form-control"
                           id="referencia"
                           name="reference"
                           placeholder="Enter referencia">
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

                <div class="form-group">
                    <label for="email">descricao</label>
                    <input type="text"
                           class="form-control"
                           id="description"
                           name="description"
                           placeholder="Enter descricao">
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

                <div class="form-group">
                    <label for="preco">preco</label>
                    <input type="number"
                           class="form-control"
                           id="price"
                           name="price"
                           placeholder="Enter preco">
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

                <div class="form-group">
                    <label for="stock">stock</label>
                    <input type="number"
                           class="form-control"
                           id="stock"
                           name="stock"
                           placeholder="Enter stock">
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
                <div class="form-group">
                <select name="iva_id">
                    <?php foreach($iva as $ivas){?>
                        <option value="<?= $ivas->id?>"> <?= $ivas->description; ?></option>
                    <?php } ?>
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
                        name="create">Create</button>
            </form>
        </div>
    </div>
</section>
</body>
</html>