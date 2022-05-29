<!DOCTYPE html>
<html>
<head>
    <title>Editar Fatura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=bills&a=update&id=<?= $bill->id ?>" method="post"
                  style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Editar Fatura</h4><hr><br>

                <div class="form-group">
                    <label for="date">Data:</label>
                    <input type="date"
                           class="form-control"
                           id="date"
                           name="date"
                           placeholder="Inserir Data"
                           value="<?= date_format($bill->date, 'Y-m-d') ?>">
                </div>

                <?php
                if(isset($bill->errors)) {
                    if (is_array($bill->errors->on('date'))) {
                        foreach ($bill->errors->on('date') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $bill->errors->on('date');
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
                           placeholder="Inserir Valor Total"
                           value="<?= $bill->total_value ?>">
                </div>

                <?php
                if(isset($bill->errors)) {
                    if (is_array($bill->errors->on('total_value'))) {
                        foreach ($bill->errors->on('total_value') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $bill->errors->on('total_value');
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
                           placeholder="Inserir Iva Total"
                           value="<?= $bill->total_iva ?>">
                </div>

                <?php
                if(isset($bill->errors)) {
                    if (is_array($bill->errors->on('total_iva'))) {
                        foreach ($bill->errors->on('total_iva') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $bill->errors->on('total_iva');
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="state">Estado:</label>
                    <select class="form-control" id="state" name="state">
                        <option value="">Nenhum</option>
                        <option value="f" <?= $bill->state == 'l' ? 'selected' : '' ?>>Em Lançamento</option>
                        <option value="e" <?= $bill->state == 'e' ? 'selected' : '' ?>>Emitida</option>
                    </select>
                </div>

                <?php
                if(isset($bill->errors)) {
                    if (is_array($bill->errors->on('state'))) {
                        foreach ($bill->errors->on('state') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $bill->errors->on('state');
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
                           placeholder="Inserir Referência Cliente"
                           value="<?= $bill->client_reference_id ?>">
                </div>

                <?php
                if(isset($bill->errors)) {
                    if (is_array($bill->errors->on('client_reference_id'))) {
                        foreach ($bill->errors->on('client_reference_id') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $bill->errors->on('client_reference_id');
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
                           placeholder="Inserir Referência Funcionário"
                           value="<?= $bill->employee_reference_id ?>">
                </div>

                <?php
                if(isset($bill->errors)) {
                    if (is_array($bill->errors->on('employee_reference_id'))) {
                        foreach ($bill->errors->on('employee_reference_id') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $bill->errors->on('employee_reference_id');
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