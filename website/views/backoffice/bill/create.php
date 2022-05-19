
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
            <label for="date">date</label>
            <input type="text"
                   class="form-control"
                   id="date"
                   name="date"
                   placeholder="Enter date">
        </div>


        <div class="form-group">
            <label for="total_value">total_value</label>
            <input type="text"
                   class="form-control"
                   id="total_value"
                   name="total_value"
                   placeholder="Enter total_value">
        </div>



        <div class="form-group">
            <label for="total_iva">total_iva</label>
            <input type="text"
                   class="form-control"
                   id="total_iva"
                   name="total_iva"
                   placeholder="Enter total_iva">
        </div>



        <div class="form-group">
            <label for="state">state</label>
            <input type="text"
                   class="form-control"
                   id="state"
                   name="state"
                   placeholder="Enter state">
        </div>



        <div class="form-group">
            <label for="client_reference_id">client_reference_id</label>
            <input type="text"
                   class="form-control"
                   id="client_reference_id"
                   name="client_reference_id"
                   placeholder="Enter client_reference_id">
        </div>


        <div class="form-group">
            <label for="employee_reference_id">employee_reference_id</label>
            <input type="text"
                   class="form-control"
                   id="employee_reference_id"
                   name="employee_reference_id"
                   placeholder="Enter employee_reference_id">
        </div>

        <button type="submit"
                class="btn btn-primary"
                name="create">Create</button>
    </form>
</div>
</div>
</body>
</html>