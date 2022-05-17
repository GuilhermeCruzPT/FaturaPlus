
<!DOCTYPE html>
<html >
<head>
    <title >Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRPAGE ?>public/css/backoffice.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="box" style=" margin: 200px;">

    <form action="router.php?c=bill&a=save" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

        <h4 class="display-4 text-center">Create</h4><hr><br>

        <?php
       /* if (isset($products)){
        if ($products->errors->on('referencia')) {
            echo "<font color='red'>" . $products->errors->on('referencia') . "</font>";
        }}*/
        ?>

        <div class="form-group">
            <label for="Data">data</label>
            <input type="text"
                   class="form-control"
                   id="data"
                   name="data"
                   placeholder="Enter Data">
        </div>


        <div class="form-group">
            <label for="Valor">valor_total</label>
            <input type="text"
                   class="form-control"
                   id="valor_total"
                   name="valor_total"
                   placeholder="Enter Valor_total">
        </div>



        <div class="form-group">
            <label for="IVA">iva_total</label>
            <input type="text"
                   class="form-control"
                   id="iva_total"
                   name="iva_total"
                   placeholder="Enter Iva total">
        </div>



        <div class="form-group">
            <label for="Estado">estado</label>
            <input type="text"
                   class="form-control"
                   id="estado"
                   name="estado"
                   placeholder="Enter Estado">
        </div>



        <div class="form-group">
            <label for="Referencia cliente">referencia_cliente</label>
            <input type="text"
                   class="form-control"
                   id="referencia_cliente"
                   name="referencia_cliente"
                   placeholder="Enter Referencia cliente">
        </div>


        <div class="form-group">
            <label for="Referencia funcionario">referencia_funcionario</label>
            <input type="text"
                   class="form-control"
                   id="referencia_cliente"
                   name="referencia_cliente"
                   placeholder="Enter referencia funcionario">
        </div>

        <button type="submit"
                class="btn btn-primary"
                name="create">Create</button>
    </form>
</div>
</div>
</body>
</html>