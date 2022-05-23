<!DOCTYPE html>
<html>
<head>
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<section class="home-section">
<body>
<div class="container">
    <div class="box" style=" margin: 200px;background: white;" >


    <form action="router.php?c=products&a=update&id=<?= $product->id ?>" method="post"
          style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

        <h4 class="display-4 text-center">Update</h4><hr><br>

        <div class="form-group">
            <label for="name">referencia</label>
            <input type="name"
                   class="form-control"
                   id="reference"
                   name="reference"
                   placeholder="Enter referencia"
                   value="<?= $product->reference ?>">
        </div>

        <?php
        if(isset($products->errors)) {
            if (is_array($products->errors->on('reference'))) {
                foreach ($products->errors->on('reference') as $error) {
                    echo $error . '<br>';
                }
            } else {
                echo $products->errors->on('reference');
            }
        }

        ?>

        <div class="form-group">
            <label for="email">descricao</label>
            <input type="text"
                   class="form-control"
                   id="description"
                   name="description"
                   placeholder="Enter descricao"
                   value="<?= $product->description ?>">
        </div>

        <?php
        if(isset($products->errors)) {
            if (is_array($products->errors->on('description'))) {
                foreach ($products->errors->on('description') as $error) {
                    echo $error . '<br>';
                }
            } else {
                echo $products->errors->on('description');
            }
        }

        ?>

        <div class="form-group">
            <label for="preco">preco</label>
            <input type="text"
                   class="form-control"
                   id="price"
                   name="price"
                   placeholder="Enter preco"
                   value="<?= $product->price ?>">
        </div>

        <?php
        if(isset($products->errors)) {
            if (is_array($products->errors->on('price'))) {
                foreach ($products->errors->on('price') as $error) {
                    echo $error . '<br>';
                }
            } else {
                echo $products->errors->on('price');
            }
        }

        ?>

        <div class="form-group">
            <label for="preco">stock</label>
            <input type="value"
                   class="form-control"
                   id="stock"
                   name="stock"
                   placeholder="Enter stock"
                   value="<?= $product->stock ?>">
        </div>
        <?php
        if(isset($products->errors)) {
            if (is_array($products->errors->on('stock'))) {
                foreach ($products->errors->on('stock') as $error) {
                    echo $error . '<br>';
                }
            } else {
                echo $products->errors->on('stock');
            }
        }

        ?>

        <div class="form-group">
            <label for="vigor">vigor</label>
            <input type="text"
                   class="form-control"
                   id="vigor"
                   name="iva_id"
                   placeholder="Enter iva_id"
                   value="<?= $product->iva_id ?>">
        </div>

        <?php
        if(isset($products->errors)) {
            if (is_array($products->errors->on('iva_id'))) {
                foreach ($products->errors->on('iva_id') as $error) {
                    echo $error . '<br>';
                }
            } else {
                echo $products->errors->on('iva_id');
            }
        }

        ?>

        <button type="submit"
                class="btn btn-primary"
                name="update">Update</button>
    </form>
</div>
</div>
</body>
</section>
</html>