<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <title>Fatura</title>
    <style>
        * {
            box-sizing: border-box;
        }
        table {
            width: 100%;
        }
        .invoice {
            padding: 2rem;
        }
        .invoice__header {
            border-bottom: 4px solid black;
            padding-bottom: 2rem;
        }
        .invoice__header:before, .invoice__header:after {
            content: " ";
            display: table;
        }
        .invoice__header:after {
            clear: both;
        }
        .invoice__header-item {
            width: 25%;
            float: left;
            padding: 0 0.5rem;
        }
        .invoice__body {
            padding: 2rem 0;
            border-bottom: 2px solid black;
        }
        .invoice__body thead {
            font-weight: bold;
        }
        .invoice__body thead td {
            padding-bottom: 1rem;
        }
        .invoice__body td {
            padding: 0 0.5rem;
        }
        .invoice__totals {
            width: 25%;
            float: right;
        }
        .invoice__subtotals, .invoice__grandtotal {
            padding: 2rem 0.5rem;
        }
        .invoice__subtotals {
            border-bottom: 4px solid black;
        }
        .invoice__grandtotal {
            font-size: 150%;
            font-weight: bold;
        }
        .text-right {
            text-align: right;
        }

    </style>
</head>
<body>
    <div class="invoice">
        <header class="invoice__header">
            <div class="invoice__header-item"><h2>Fatura Plus<h2></div>
            <div class="invoice__header-item">
                <p>
                    <strong>Empresa</strong>
                    <br>E-mail: faturaplus@gmail.com
                    <br>Telefone: 956154645
                    <br>Nif: 265246564
                    <br>Código Postal: 1234-127
                    <br>País: Portugal
                    <br>Cidade: Torres Vedras
                    <br>Localidade: Localidade Teste
                    <br>Morada: Morada Teste
                </p>
            </div>

            <div class="invoice__header-item">
                <p>
                    <strong>Cliente</strong>
                    <br>NUGNES
                    <br>CORSO V. EMANUELE, 195
                    <br>70059 Trani
                    <br>Bari
                    <br>Italy
                    <br>CORSO V.
                    <br>dsfeefgesf
                    <br>70059 Trani
                </p>
            </div>

            <div class="invoice__header-item">
                <p>
                    <strong>Data:</strong> 15/16/1520<br>
                    <strong>Referência Cliente:</strong> ABCDEFGH3843<br>
                    <strong>Referência Funcionário:</strong> ABCDEFGH3843
                </p>
            </div>
        </header>

        <div class="invoice__body">
            <table>
                <thead>
                <tr>
                    <td>Referência do Produto</td>
                    <td>Título</td>
                    <td class="text-right">Qtd</td>
                    <td class="text-right">Valor<br>(€ s/IVA)</td>
                    <td class="text-right">IVA (%)</td>
                    <td class="text-right">IVA (€)</td>
                    <td class="text-right">Valor<br>(€ c/IVA)</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>FHABHBJUJ</td>
                    <td>Runner 3.0 Low Fuse Grey</td>
                    <td class="text-right">1</td>
                    <td class="text-right">10</td>
                    <td class="text-right">888,90</td>
                    <td class="text-right">30</td>
                    <td class="text-right">266,67</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="invoice__totals">
            <div class="invoice__subtotals">
                <table>
                    <tbody>
                    <tr>
                        <td><strong>Valor Total</strong></td>
                        <td class="text-right">800,01</td>
                    </tr>
                    <tr>
                        <td><strong>Iva Total</strong></td>
                        <td class="text-right">0,00</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="invoice__grandtotal">
                <table>
                    <tbody>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td class="text-right">800,01</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>