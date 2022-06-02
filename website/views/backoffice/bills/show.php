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
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=bills&a=index" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Mostrar Fatura</h4><hr><br>

                <div class="form-group">
                    <label for="reference">Referência:</label>
                    <input type="text"
                           class="form-control"
                           id="reference"
                           name="reference"
                           value="F<?= $bill->reference ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="date">Data:</label>
                    <input type="text"
                           class="form-control"
                           id="date"
                           name="date"
                           value="<?= date_format($bill->date, 'd/m/Y') ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="total_value">Valor Total:</label>
                    <input type="text"
                           class="form-control"
                           id="total_value"
                           name="total_value"
                           value="<?= $bill->total_value ?>€" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="total_iva">Iva Total:</label>
                    <input type="text"
                           class="form-control"
                           id="total_iva"
                           name="total_iva"
                           value="<?= $bill->total_iva ?>%" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="state">Estado:</label>
                    <input type="text"
                           class="form-control"
                           id="state"
                           name="state"
                           value="<?= $bill->state == 'l' ? 'Em Lançamento' : 'Emitida' ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="client_reference_id">Referência Cliente:</label>
                    <input type="text"
                           class="form-control"
                           id="client_reference_id"
                           name="client_reference_id"
                           value="<?= $bill->client_reference->username ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="employee_reference_id">Referência Funcionário</label>
                    <input type="text"
                           class="form-control"
                           id="employee_reference_id"
                           name="employee_reference_id"
                           value="<?= $bill->employee_reference->username ?>" disabled>
                </div>

                <br><br>

                <a href="router.php?c=bills&a=index"
                   class=" btn btn-primary"
                   role="button"
                   aria-pressed="true">Voltar</a>

            </form>
        </div>
    </div>
</section>
</body>
</html>