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
        <div class="box" style="margin: 100px;
             background: white;">

            <form action="router.php?c=lines&a=index" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Mostrar Linha da Fatura</h4>

                <div class="form-group">
                    <label for="date">Quantidade:</label>
                    <input type="text"
                           class="form-control"
                           id="quantity"
                           readonly="true"
                           name="quantity"
                           value="<?= $bill_lines->quantity ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="total_value">Valor Unitário:</label>
                    <input type="text"
                           class="form-control"
                           id="unitary_value"
                           readonly="true"
                           name="unitary_value"
                           value="<?= $bill_lines->unitary_value ?>€">
                </div>

                <br>

                <div class="form-group">
                    <label for="total_iva">Iva:</label>
                    <input type="text"
                           class="form-control"
                           id="iva_value"
                           readonly="true"
                           name="iva_value"
                           value="<?= $bill_lines->iva_value ?>€">
                </div>

                <br>

                <div class="form-group">
                    <label for="state">Referência Produto:</label>
                    <input type="text"
                           class="form-control"
                           id="product_id"
                           readonly="true"
                           name="product_id"
                           value="P<?= $bill_lines->product->reference ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="client_reference_id">Referência Fatura:</label>
                    <input type="text"
                           class="form-control"
                           id="bill_id"
                           readonly="true"
                           name="bill_id"
                           value="F<?= $bill_lines->bill->reference ?>">
                </div>

                <br><br>

                <a href="router.php?c=lines&a=index"
                   class=" btn btn-primary"
                   role="button"
                   aria-pressed="true">Voltar</a>

            </form>
        </div>
    </div>
</section>
</body>
</html>