<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Utilizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=users&a=index" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Mostrar Utilizador</h4><hr><br>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text"
                           class="form-control"
                           id="username"
                           readonly="true"
                           name="username"
                           value="<?= $user->username ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="image">Imagem:</label>
                    <input type="text"
                           class="form-control"
                           id="image"
                           readonly="true"
                           name="image"
                           value="<?= $user->image ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text"
                           class="form-control"
                           id="name"
                           readonly="true"
                           name="name"
                           value="<?= $user->name ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="text"
                           class="form-control"
                           id="email"
                           readonly="true"
                           name="email"
                           value="<?= $user->email ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="phone">Número:</label>
                    <input type="text"
                           class="form-control"
                           id="phone"
                           readonly="true"
                           name="phone"
                           value="<?= $user->phone ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="nif">Nif:</label>
                    <input type="text"
                           class="form-control"
                           id="nif"
                           readonly="true"
                           name="nif"
                           value="<?= $user->nif ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="postal_code">Código Postal:</label>
                    <input type="text"
                           class="form-control"
                           id="postal_code"
                           readonly="true"
                           name="postal_code"
                           value="<?= $user->postal_code ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="birth">Data de Nascimento:</label>
                    <input type="text"
                           class="form-control"
                           id="birth"
                           readonly="true"
                           name="birth"
                           value="<?= $user->birth ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="genre">Género:</label>
                    <input type="text"
                           class="form-control"
                           id="genre"
                           readonly="true"
                           name="genre"
                           value="<?= $user->genre ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="coutry">País:</label>
                    <input type="text"
                           class="form-control"
                           id="coutry"
                           readonly="true"
                           name="coutry"
                           value="<?= $user->coutry ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="city">Cidade:</label>
                    <input type="text"
                           class="form-control"
                           id="city"
                           readonly="true"
                           name="city"
                           value="<?= $user->city ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="locale">Localidade:</label>
                    <input type="text"
                           class="form-control"
                           id="locale"
                           readonly="true"
                           name="locale"
                           value="<?= $user->locale ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="address">Morada:</label>
                    <input type="text"
                           class="form-control"
                           id="address"
                           readonly="true"
                           name="address"
                           value="<?= $user->address ?>">
                </div>

                <br>

                <div class="form-group">
                    <label for="role">Permissão:</label>
                    <input type="text"
                           class="form-control"
                           id="role"
                           readonly="true"
                           name="role"
                           value="<?= $user->role ?>">
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