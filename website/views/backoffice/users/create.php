<!DOCTYPE html>
<html>
<head>
    <title >Criar Utilizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style=" margin: 200px; background: white;">

            <form action="router.php?c=users&a=save" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Criar Utilizador</h4><hr><br>

                <?php
                /* if (isset($products)){
                 if ($products->errors->on('referencia')) {
                     echo "<font color='red'>" . $products->errors->on('referencia') . "</font>";
                 }}*/
                ?>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text"
                           class="form-control"
                           id="username"
                           name="username"
                           placeholder="Inserir Username">
                </div>

                <br>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password"
                           class="form-control"
                           id="password"
                           name="password"
                           placeholder="Inserir Password">
                </div>

                <br>

                <div class="form-group">
                    <label for="image">Imagem:</label>
                    <input type="text"
                           class="form-control"
                           id="image"
                           name="image"
                           placeholder="Inserir Imagem">
                </div>

                <br>

                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text"
                           class="form-control"
                           id="name"
                           name="name"
                           placeholder="Inserir Nome">
                </div>

                <br>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           placeholder="Inserir E-mail">
                </div>

                <br>

                <div class="form-group">
                    <label for="phone">Número:</label>
                    <input type="number"
                           class="form-control"
                           id="phone"
                           name="phone"
                           placeholder="Inserir Número">
                </div>

                <br>

                <div class="form-group">
                    <label for="nif">Nif:</label>
                    <input type="number"
                           class="form-control"
                           id="nif"
                           name="nif"
                           placeholder="Inserir Nif">
                </div>

                <br>

                <div class="form-group">
                    <label for="postal_code">Código Postal:</label>
                    <input type="text"
                           class="form-control"
                           id="postal_code"
                           name="postal_code"
                           placeholder="Inserir Código Postal">
                </div>

                <br>

                <div class="form-group">
                    <label for="birth">Data de Nascimento:</label>
                    <input type="date"
                           class="form-control"
                           id="birth"
                           name="birth"
                           placeholder="Inserir Código Postal">
                </div>

                <br>

                <div class="form-group">
                    <label for="genre">Género:</label>
                    <select class="form-control" id="genre" name="genre">
                        <option value="m">Masculino</option>
                        <option value="f">Feminino</option>
                    </select>
                </div>

                <br>

                <div class="form-group">
                    <label for="coutry">País:</label>
                    <input type="text"
                           class="form-control"
                           id="coutry"
                           name="coutry"
                           placeholder="Inserir País">
                </div>

                <br>

                <div class="form-group">
                    <label for="city">Cidade:</label>
                    <input type="text"
                           class="form-control"
                           id="city"
                           name="city"
                           placeholder="Inserir Cidade">
                </div>

                <br>

                <div class="form-group">
                    <label for="locale">Localidade:</label>
                    <input type="text"
                           class="form-control"
                           id="locale"
                           name="locale"
                           placeholder="Inserir Localidade">
                </div>

                <br>

                <div class="form-group">
                    <label for="address">Morada:</label>
                    <input type="text"
                           class="form-control"
                           id="address"
                           name="address"
                           placeholder="Inserir Morada">
                </div>

                <br>

                <div class="form-group">
                    <label for="role">Permissão:</label>
                    <input type="text"
                           class="form-control"
                           id="role"
                           name="role"
                           placeholder="Inserir Permissão">
                </div>

                <br>

                <button type="submit"
                        class="btn btn-primary"
                        name="create">Criar</button>

            </form>
        </div>
    </div>
</section>
</body>
</html>