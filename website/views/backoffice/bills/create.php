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
        <div class="box" style=" margin: 200px;">

            <form action="router.php?c=bills&a=save" method="post" style="
            width: 1000px;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Criar Fatura</h4><hr><br>

                <div class="form-group">
                    <label for="date">Data:</label>
                    <input type="date"
                           class="form-control"
                           id="date"
                           name="date"
                           placeholder="Inserir Data">
                </div>

                <?php
                if(isset($bills->errors)) {
                    if (is_array($bills->errors->on('date'))) {
                        foreach ($bills->errors->on('date') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $bills->errors->on('date')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="total_value">Valor Total:</label>
                    <input type="number"
                           class="form-control"
                           id="total_value"
                           name="total_value"
                           placeholder="Inserir Valor Total">
                </div>

                <?php
                if(isset($bills->errors)) {
                    if (is_array($bills->errors->on('total_value'))) {
                        foreach ($bills->errors->on('total_value') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $bills->errors->on('total_value')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="total_iva">Iva Total:</label>
                    <input type="text"
                           class="form-control"
                           id="total_iva"
                           name="total_iva"
                           placeholder="Inserir Iva Total">
                </div>

                <?php
                if(isset($bills->errors)) {
                    if (is_array($bills->errors->on('total_iva'))) {
                        foreach ($bills->errors->on('total_iva') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $bills->errors->on('total_iva')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="state">Estado:</label>
                    <input type="text"
                           class="form-control"
                           id="state"
                           name="state"
                           placeholder="Inserir Estado">
                </div>

                <?php
                if(isset($bills->errors)) {
                    if (is_array($bills->errors->on('state'))) {
                        foreach ($bills->errors->on('state') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $bills->errors->on('state')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="client_reference_id">Referência Cliente:</label>
                    <input type="text"
                           class="form-control"
                           id="client_reference_id"
                           name="client_reference_id"
                           placeholder="Inserir Referência Cliente">
                </div>

                <?php
                if(isset($bills->errors)) {
                    if (is_array($bills->errors->on('client_reference_id'))) {
                        foreach ($bills->errors->on('client_reference_id') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $bills->errors->on('client_reference_id')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="employee_reference_id">Referência Funcionário:</label>
                    <input type="text"
                           class="form-control"
                           id="employee_reference_id"
                           name="employee_reference_id"
                           placeholder="Inserir Referência Funcionário">
                </div>

                <?php
                if(isset($bills->errors)) {
                    if (is_array($bills->errors->on('employee_reference_id'))) {
                        foreach ($bills->errors->on('employee_reference_id') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $bills->errors->on('employee_reference_id')."</font>";
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