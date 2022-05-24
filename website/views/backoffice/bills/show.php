<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Fatura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>

<section class="home-section">

    <div class="container">
        <div class="box" style=" margin: 200px;">

            <form action="router.php?c=bills&a=index" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Mostrar Fatura</h4>

                <div class="form-group">
                    <label for="date">Data:</label>
                    <input type="text"
                           class="form-control"
                           id="date"
                           name="date"
                           value="<?= $bill->data ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="total_value">Valor Total:</label>
                    <input type="text"
                           class="form-control"
                           id="total_value"
                           name="total_value"
                           value="<?= $bill->valor_total ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="total_iva">Iva Total:</label>
                    <input type="text"
                           class="form-control"
                           id="total_iva"
                           name="total_iva"
                           value="<?= $bill->iva_total ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="state">Estado:</label>
                    <input type="text"
                           class="form-control"
                           id="state"
                           name="state"
                           value="<?= $bill->state ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="client_reference_id">Referência Cliente:</label>
                    <input type="text"
                           class="form-control"
                           id="client_reference_id"
                           name="client_reference_id"
                           value="<?= $bill->client_reference_id ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="employee_reference_id">Referência Funcionário</label>
                    <input type="text"
                           class="form-control"
                           id="employee_reference_id"
                           name="employee_reference_id"
                           value="<?= $bill->employee_reference_id ?>">
                </div>

                <br>

                <button type="submit"
                        class="btn btn-primary"
                        name="return">Voltar</button>

            </form>
        </div>
    </div>
</section>
</body>
</html>