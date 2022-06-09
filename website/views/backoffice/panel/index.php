<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box">

            <h4 class="display-4 align-text-top" style="padding-top: 25px;">Painel Geral</h4><br>

            <?php
            $client = 0;
            $employee = 0;
            $admin = 0;

            foreach ($users as $user) {
                if ($user->role == 'c')
                    $client += 1;
                else if ($user->role == 'f')
                    $employee += 1;
                else
                    $admin += 1;
            }

            $emitida= 0;
            $lancamento = 0;
            $lineEmitido = 0;
            $lineLancamento = 0;

            $produtoEmitido = 0;
            $produtoLancamento = 0;
            $produtoStock = 0;
            $produtoHistorico = 0;

            $totalUnitEmitida = 0;
            $totalIvaEmitida = 0;
            $totalUnitLancamento = 0;
            $totalIvaLancamento = 0;

            foreach ($bills as $bill) {
                if ($bill->state == 'e'){
                    $emitida += 1;
                    $totalUnitEmitida += $bill->total_value;
                    $totalIvaEmitida += $bill->total_iva;

                    foreach ($lines as $line) {
                        if ($bill->id == $line->bill_id) {
                            $lineEmitido += 1;
                            $produtoEmitido += $line->quantity;
                            $produtoHistorico += $line->quantity;
                        }
                        else {
                            $lineLancamento += 1;
                            $produtoLancamento += $line->quantity;
                            $produtoHistorico += $line->quantity;
                        }
                    }
                }
                else {
                    $lancamento += 1;
                    $totalUnitLancamento += $bill->total_value;
                    $totalIvaLancamento += $bill->total_iva;
                }
            }

            foreach ($products as $product) {
                $produtoStock += $product->stock;
                $produtoHistorico += $product->stock;
            }
            ?>

            <div class="container-fluid">
                <section id="minimal-statistics">
                    <div class="row">
                        <div class="col-12 mt-3 mb-1">
                            <h4 class="text-uppercase">Estatisticas Gerais</h4>
                            <p>Dados sempre atualizados</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card"><a href="router.php?c=users&a=index">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="success"><?= $count = count($users); ?></h3>
                                                <span>Contas</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class='bx bx-user bx-tada success font-large-2 float-right' ></i>
                                            </div>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card"><a href="router.php?c=users&a=index&role=a">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="warning"><?= $admin ?></h3>
                                                <span>Admins</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class='bx bx-user bx-tada warning font-large-2 float-right' ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card"><a href="router.php?c=users&a=index&role=f">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="danger"><?= $employee ?></h3>
                                                <span>Funcionários</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class='bx bx-user bx-tada danger font-large-2 float-right' ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card"><a href="router.php?c=users&a=index&role=c">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="primary"><?= $client ?></h3>
                                                <span>Clientes</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class='bx bx-user bx-tada primary font-large-2 float-right' ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card"><a href="router.php?c=bills&a=index">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="danger"><?= $count = count($bills); ?></h3>
                                                <span>Faturas</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class='bx bx-spreadsheet bx-tada danger font-large-2 float-right' ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card"><a href="router.php?c=lines&a=index">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="success"><?= $count = count($lines); ?></h3>
                                                <span>Linhas de Fat.</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class='bx bx-list-plus bx-tada success font-large-2 float-right' ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card"><a href="router.php?c=products&a=index">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="primary"><?= $count = count($products); ?></h3>
                                                <span>Produtos</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class='bx bx-pie-chart-alt-2 bx-tada primary font-large-2 float-right' ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card"><a href="router.php?c=ivas&a=index">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="warning"><?= $count = count($ivas); ?></h3>
                                                <span>Ivas</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class='bx bx-coin-stack bx-tada warning font-large-2 float-right' ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="minimal-statistics">

                    <div class="row">
                        <div class="col-12 mt-3 mb-1">
                            <h4 class="text-uppercase">Estatisticas Específicas</h4>
                            <p>Dados sempre atualizados</p>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class='bx bx-receipt bx-tada primary font-large-2 float-left' ></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3><?= $emitida ?></h3>
                                                <span>Fataturas<br>Emitidas</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class='bx bx-receipt bx-tada warning font-large-2 float-left' ></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3><?= $lancamento ?></h3>
                                                <span>Fataturas em<br>Lançamento</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="bx bx-list-plus bx-tada success font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3><?= $lineEmitido ?></h3>
                                                <span>Linhas Fat.<br>Emitidas</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center"
                                                <i class="icon-pointer danger font-large-2 float-left"></i>
                                                <i class="bx bx-list-plus bx-tada danger font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3><?= $lineLancamento ?></h3>
                                                <span>Linhas Fat. em<br>Lançamento</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="icon-graph success font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3><?= $produtoEmitido ?></h3>
                                                <span>Produtos<br>Vendidos</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="icon-pointer danger font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3><?= $produtoLancamento ?></h3>
                                                <span>Produtos<br>Retidos</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class='bx bx-purchase-tag-alt bx-tada warning font-large-2 float-left' ></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3><?= $produtoStock ?></h3>
                                                <span>Produtos<br>Stock</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class='bx bx-history bx-tada primary font-large-2 float-left' ></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3><?= $produtoHistorico ?></h3>
                                                <span>Produtos<br>Histórico</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </section>

                <section id="stats-subtitle">

                    <div class="row">
                        <div class="col-12 mt-3 mb-1">
                            <h4 class="text-uppercase">Outras Estatisticas</h4>
                            <p>Dados sempre atualizados</p>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xl-6 col-md-12">
                            <div class="card overflow-hidden">
                                <div class="card-content">
                                    <div class="card-body cleartfix">
                                        <div class="media align-items-stretch">
                                            <div class="align-self-center">
                                                <i class='bx bx-coin bx-tada primary font-large-2 mr-2' ></i>
                                            </div>
                                            <div class="media-body">
                                                <h4>Valor Total</h4>
                                                <span>Unitário (€)</span><br>
                                                <span>Fat. Emitida</span>
                                            </div>
                                            <div class="align-self-center">
                                                <h1><?= number_format($totalUnitEmitida, 2, '.', '') ?>€</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-12">
                            <div class="card overflow-hidden">
                                <div class="card-content">
                                    <div class="card-body cleartfix">
                                        <div class="media align-items-stretch">
                                            <div class="align-self-center">
                                                <i class='bx bx-coin bx-tada primary font-large-2 mr-2' ></i>
                                            </div>
                                            <div class="media-body">
                                                <h4>Valor Total</h4>
                                                <span>Unitário (€)</span><br>
                                                <span>Fat. em Lançamento</span>
                                            </div>
                                            <div class="align-self-center">
                                                <h1><?= number_format($totalUnitLancamento, 2, '.', '') ?>€</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xl-6 col-md-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body cleartfix">
                                        <div class="media align-items-stretch">
                                            <div class="align-self-center">
                                                <i class='bx bx-credit-card bx-tada warning font-large-2 mr-2' ></i>
                                            </div>
                                            <div class="media-body">
                                                <h4>Valor Total</h4>
                                                <span>Iva (€)</span><br>
                                                <span>Fat. Emitida</span>
                                            </div>
                                            <div class="align-self-center">
                                                <h1><?= number_format($totalIvaEmitida, 2, '.', '') ?>€</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body cleartfix">
                                        <div class="media align-items-stretch">
                                            <div class="align-self-center">
                                                <i class='bx bx-credit-card bx-tada warning font-large-2 mr-2' ></i>
                                            </div>
                                            <div class="media-body">
                                                <h4>Valor Total</h4>
                                                <span>Iva (€)</span><br>
                                                <span>Fat. em Lançamento</span>
                                            </div>
                                            <div class="align-self-center">
                                                <h1><?= number_format($totalIvaLancamento, 2, '.', '') ?>€</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xl-6 col-md-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body cleartfix">
                                        <div class="media align-items-stretch">
                                            <div class="align-self-center">
                                                <i class='bx bx-wallet bx-tada success font-large-2 mr-2' ></i>
                                            </div>
                                            <div class="media-body">
                                                <h4>Valor Total</h4>
                                                <span>Unitário e Iva</span><br>
                                                <span>Fat. Emitida</span>
                                            </div>
                                            <div class="align-self-center">
                                                <h1><?= number_format($totalUnitEmitida + $totalIvaEmitida, 2, '.', '') ?>€</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body cleartfix">
                                        <div class="media align-items-stretch">
                                            <div class="align-self-center">
                                                <i class='bx bx-wallet bx-tada danger font-large-2 mr-2' ></i>
                                            </div>
                                            <div class="media-body">
                                                <h4>Valor Total</h4>
                                                <span>Unitário e Iva</span><br>
                                                <span>Fat. em Lançamento</span>
                                            </div>
                                            <div class="align-self-center">
                                                <h1><?= number_format($totalUnitLancamento + $totalIvaLancamento, 2, '.', '') ?>€</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </section>
            </div>
        </div>
    </div>
</section>
</body>
</html>