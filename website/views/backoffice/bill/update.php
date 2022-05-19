<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRPAGE ?>public/css/backoffice.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="box" style=" margin: 200px;" >


    <form action="router.php?c=products&a=update&id_product=<?= $product->id_product ?>" method="post"
          style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

        <h4 class="display-4 text-center">Update</h4><hr><br>

        <div class="form-group">
            <label for="Data">data</label>
            <input type="data"
                   class="form-control"
                   id="data"
                   name="data"
                   placeholder="Enter data"
                   value="<?=$bill->data ?>">
        </div>

        <div class="form-group">
            <label for="Valor Total">valor_total</label>
            <input type="number"
                   class="form-control"
                   id="valor_total"
                   name="valor_total"
                   placeholder="Enter valor total"
                   value="<?= $bill->valor_total ?>">
        </div>

        <div class="form-group">
            <label for="Iva Total">iva_total</label>
            <input type="number"
                   class="form-control"
                   id="iva_total"
                   name="iva_total"
                   placeholder="Enter iva total"
                   value="<?= $bill->iva_total ?>">
        </div>
        <div class="form-group">
            <label for="Estado">estado</label>
            <input type="text"
                   class="form-control"
                   id="estado"
                   name="estado"
                   placeholder="Enter estado"
                   value="<?= $bill->estado ?>">
        </div>

        <div class="form-group">
            <label for="Referencia Cliente">referencia_cliente</label>
            <input type="text"
                   class="form-control"
                   id="referencia_cliente"
                   name="referencia_cliente"
                   placeholder="Enter referencia_cliente"
                   value="<?= $bill->referencia_cliente ?>">
        </div>


        <div class="form-group">
            <label for="Referencia Funcionario">referencia_funcionario</label>
            <input type="text"
                   class="form-control"
                   id="referencia_funcionario"
                   name="referencia_funcionario"
                   placeholder="Enter referencia_funcionario"
                   value="<?= $bill->referencia_funcionario ?>">
        </div>

        <button type="submit"
                class="btn btn-primary"
                name="update">Update</button>
    </form>
</div>
</div>
</body>
</html>