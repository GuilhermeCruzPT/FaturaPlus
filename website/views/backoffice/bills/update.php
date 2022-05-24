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


    <form action="router.php?c=bills&a=update&id=<?= $bill->id ?>" method="post"
          style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

        <h4 class="display-4 text-center">Update</h4><hr><br>

        <div class="form-group">
            <label for="date">date</label>
            <input type="text"
                   class="form-control"
                   id="date"
                   name="date"
                   value="<?= $bill->data ?>">
        </div>

        <div class="form-group">
            <label for="total_value">total_value</label>
            <input type="text"
                   class="form-control"
                   id="total_value"
                   name="total_value"
                   value="<?= $bill->valor_total ?>">
        </div>

        <div class="form-group">
            <label for="total_iva">total_iva</label>
            <input type="text"
                   class="form-control"
                   id="total_iva"
                   name="total_iva"
                   value="<?= $bill->iva_total ?>">
        </div>

        <div class="form-group">
            <label for="state">state</label>
            <input type="text"
                   class="form-control"
                   id="state"
                   name="state"
                   value="<?= $bill->estado ?>">
        </div>

        <div class="form-group">
            <label for="client_reference_id">client_reference_id</label>
            <input type="text"
                   class="form-control"
                   id="client_reference_id"
                   name="client_reference_id"
                   value="<?= $bill->referencia_cliente ?>">
        </div>


        <div class="form-group">
            <label for="employee_reference_id">employee_reference_id</label>
            <input type="text"
                   class="form-control"
                   id="employee_reference_id"
                   name="employee_reference_id"
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