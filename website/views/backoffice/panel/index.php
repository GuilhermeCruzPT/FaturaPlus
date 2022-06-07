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

            <h4 class="display-4 align-text-top" style="padding-top: 25px;">Painel Principal</h4><br>

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
                            <div class="card">
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
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
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
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
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
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
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
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
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
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
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
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
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
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
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
                                                <i class="icon-pencil primary font-large-2 mr-2"></i>
                                            </div>
                                            <div class="media-body">
                                                <h4>Total Posts</h4>
                                                <span>Monthly blog posts</span>
                                            </div>
                                            <div class="align-self-center">
                                                <h1>18,000</h1>
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
                                                <i class="icon-speech warning font-large-2 mr-2"></i>
                                            </div>
                                            <div class="media-body">
                                                <h4>Total Comments</h4>
                                                <span>Monthly blog comments</span>
                                            </div>
                                            <div class="align-self-center">
                                                <h1>84,695</h1>
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
                                                <h1 class="mr-2">$76,456.00</h1>
                                            </div>
                                            <div class="media-body">
                                                <h4>Total Sales</h4>
                                                <span>Monthly Sales Amount</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="icon-heart danger font-large-2"></i>
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
                                                <h1 class="mr-2">$36,000.00</h1>
                                            </div>
                                            <div class="media-body">
                                                <h4>Total Cost</h4>
                                                <span>Monthly Cost</span>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="icon-wallet success font-large-2"></i>
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