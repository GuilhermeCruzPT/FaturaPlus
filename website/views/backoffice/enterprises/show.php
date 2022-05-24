<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=enterprises&a=index" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Mostrar Empresa</h4><hr><br>

                <div class="form-group">
                    <label for="social_designation">Designação Social:</label>
                    <input type="text"
                           class="form-control"
                           id="social_designation"
                           readonly="true"
                           name="social_designation"
                           value="<?=$enterprise->social_designation ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="text"
                           class="form-control"
                           id="email"
                           readonly="true"
                           name="email"
                           value="<?= $enterprise->email ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="phone">Número de Telemóvel:</label>
                    <input type="text"
                           class="form-control"
                           id="phone"
                           readonly="true"
                           name="phone"
                           value="<?= $enterprise->phone ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="nif">Nif:</label>
                    <input type="text"
                           class="form-control"
                           id="nif"
                           readonly="true"
                           name="nif"
                           value="<?= $enterprise->nif ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="postal_code">Código Postal:</label>
                    <input type="text"
                           class="form-control"
                           id="postal_code"
                           readonly="true"
                           name="postal_code"
                           value="<?= $enterprise->postal_code ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="country">País:</label>
                    <input type="text"
                           class="form-control"
                           id="country"
                           readonly="true"
                           name="country"
                           value="<?= $enterprise->country ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="city">Cidade:</label>
                    <input type="text"
                           class="form-control"
                           id="city"
                           readonly="true"
                           name="city"
                           value="<?= $enterprise->city ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="locale">Localidade:</label>
                    <input type="text"
                           class="form-control"
                           id="locale"
                           readonly="true"
                           name="locale"
                           value="<?= $enterprise->locale ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="address">Morada:</label>
                    <input type="text"
                           class="form-control"
                           id="address"
                           readonly="true"
                           name="address"
                           value="<?= $enterprise->address ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="social_capital">Capital Social:</label>
                    <input type="text"
                           class="form-control"
                           id="social_capital"
                           readonly="true"
                           name="social_capital"
                           value="<?= $enterprise->social_capital ?>">
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