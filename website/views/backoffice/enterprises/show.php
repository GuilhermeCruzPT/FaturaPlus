<!DOCTYPE html>
<html>
<head>
    <title>Show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRPAGE ?>public/css/backoffice.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="box" style=" margin: 200px;">

            <form action="router.php?c=bill&a=index" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Show</h4><hr><br>

                <div class="form-group">
                    <label for="Data">data</label>
                    <label for="Designação_social">designação_social</label>
                    <input type="text"
                           class="form-control"
                           id="social_designation"
                           readonly="true"
                           name="designação_social"
                           value="<?=$enterprises->designação_social ?>">
                </div>

                <div class="form-group">
                    <label for="Email">email</label>
                    <input type="text"
                           class="form-control"
                           id="email"
                           readonly="true"
                           name="email"
                           value="<?= $enterprises->email ?>">
                </div>

                <div class="form-group">
                    <label for="Phone">phone</label>
                    <input type="text"
                           class="form-control"
                           id="phone"
                           readonly="true"
                           name="phone"
                           value="<?= $enterprises->phone ?>">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="NIF">nif</label>
                        <input type="text"
                               class="form-control"
                               id="nif"
                               readonly="true"
                               name="nif"
                           value="<?= $enterprises->nif ?>">
                </div>

                <div class="form-group">
                    <label for="Postal_code">codigo_postal</label>
                    <input type="number"
                           class="form-control"
                           id="postal_code"
                           readonly="true"
                           name="codigo_postal"
                           value="<?= $enterprises->codigo_postal ?>">
                </div>


                <div class="form-group">
                    <label for="country">País</label>
                    <input type="text"
                           class="form-control"
                           id="country"
                           readonly="true"
                           name="country"
                           value="<?= $enterprises->País ?>">
                </div>


                    <div class="form-group">
                        <label for="city">Cidade</label>
                        <input type="text"
                               class="form-control"
                               id="city"
                               readonly="true"
                               name="city"
                               value="<?= $enterprises->cidade ?>">
                    </div>


                    <div class="form-group">
                        <label for="locale">Localidade</label>
                        <input type="text"
                               class="form-control"
                               id="locale"
                               readonly="true"
                               name="locale"
                               value="<?= $enterprises->Localidade ?>">
                    </div>

                    <div class="form-group">
                        <label for="address">Morada</label>
                        <input type="text"
                               class="form-control"
                               id="address"
                               readonly="true"
                               name="address"
                               value="<?= $enterprises->Morada ?>">
                    </div>

                    <div class="form-group">
                        <label for="social_capital">Capital social</label>
                        <input type="text"
                               class="form-control"
                               id="social_capital"
                               readonly="true"
                               name="social_capital"
                               value="<?= $enterprises->Capital_social ?>">
                    </div>



                    <br>
                <button type="submit"
                        class="btn btn-primary"
                        name="return">voltar</button>

            </form>
    </div>
</div>
</body>
</html>