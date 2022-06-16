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
                           name="social_designation"
                           value="<?=$enterprise->social_designation ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="text"
                           class="form-control"
                           id="email"
                           name="email"
                           value="<?= $enterprise->email ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="phone">Número de Telemóvel:</label>
                    <input type="text"
                           class="form-control"
                           id="phone"
                           name="phone"
                           value="<?= $enterprise->phone ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="nif">Nif:</label>
                    <input type="text"
                           class="form-control"
                           id="nif"
                           name="nif"
                           value="<?= $enterprise->nif ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="postal_code">Código Postal:</label>
                    <input type="text"
                           class="form-control"
                           id="postal_code"
                           name="postal_code"
                           value="<?= $enterprise->postal_code ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="country">País:</label>
                    <input type="text"
                           class="form-control"
                           id="country"
                           name="country"
                           value="<?= $enterprise->country ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="city">Cidade:</label>
                    <input type="text"
                           class="form-control"
                           id="city"
                           name="city"
                           value="<?= $enterprise->city ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="locale">Localidade:</label>
                    <input type="text"
                           class="form-control"
                           id="locale"
                           name="locale"
                           value="<?= $enterprise->locale ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="address">Morada:</label>
                    <input type="text"
                           class="form-control"
                           id="address"
                           name="address"
                           value="<?= $enterprise->address ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="social_capital">Capital Social:</label>
                    <input type="text"
                           class="form-control"
                           id="social_capital"
                           name="social_capital"
                           value="<?= $enterprise->social_capital ?>€" disabled>
                </div>

                <br><br>

                <a href="router.php?c=enterprises&a=index"
                   class="btn btn-secondary"
                   role="button"
                   aria-pressed="true">Voltar</a>

            </form>
        </div>
    </div>
</section>
</body>
</html>