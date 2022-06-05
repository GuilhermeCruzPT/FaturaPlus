<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Utilizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section-front">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=users&a=index" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Mostrar Perfil</h4><hr><br>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text"
                           class="form-control"
                           id="username"
                           name="username"
                           value="<?= $user->username ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text"
                           class="form-control"
                           id="name"
                           name="name"
                           value="<?= $user->name ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="text"
                           class="form-control"
                           id="email"
                           name="email"
                           value="<?= $user->email ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="phone">Número:</label>
                    <input type="text"
                           class="form-control"
                           id="phone"
                           name="phone"
                           value="<?= $user->phone ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="nif">Nif:</label>
                    <input type="text"
                           class="form-control"
                           id="nif"
                           name="nif"
                           value="<?= $user->nif ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="postal_code">Código Postal:</label>
                    <input type="text"
                           class="form-control"
                           id="postal_code"
                           name="postal_code"
                           value="<?= $user->postal_code ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="birth">Data de Nascimento:</label>
                    <input type="text"
                           class="form-control"
                           id="birth"
                           name="birth"
                           value="<?= date_format($user->birth, 'd/m/Y') ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="genre">Género:</label>
                    <input type="text"
                           class="form-control"
                           id="genre"
                           name="genre"
                           value="<?= $user->genre == 'm' ? 'Masculino' : 'Feminino' ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="country">País:</label>
                    <input type="text"
                           class="form-control"
                           id="country"
                           name="country"
                           value="<?= $user->country ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="city">Cidade:</label>
                    <input type="text"
                           class="form-control"
                           id="city"
                           name="city"
                           value="<?= $user->city ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="locale">Localidade:</label>
                    <input type="text"
                           class="form-control"
                           id="locale"
                           name="locale"
                           value="<?= $user->locale ?>" disabled>
                </div>

                <br>

                <div class="form-group">
                    <label for="address">Morada:</label>
                    <input type="text"
                           class="form-control"
                           id="address"
                           name="address"
                           value="<?= $user->address ?>" disabled>
                </div>

                <br><br>

                <a href="router.php?c=site&a=edit&id=<?= $user->id ?>"
                   class=" btn btn-primary"
                   role="button"
                   aria-pressed="true">Editar Perfil</a>

                <a href="router.php?c=site&a=index"
                   class=" btn btn-primary btn-back"
                   role="button"
                   aria-pressed="true">Voltar</a>

            </form>
        </div>
    </div>
</section>
</body>
</html>