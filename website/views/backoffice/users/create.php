<!DOCTYPE html>
<html >
<head>
    <title >Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style=" margin: 200px; background: white;">

            <form action="router.php?c=products&a=save" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Create</h4><hr><br>

                <?php
                /* if (isset($products)){
                 if ($products->errors->on('referencia')) {
                     echo "<font color='red'>" . $products->errors->on('referencia') . "</font>";
                 }}*/
                ?>

                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text"
                           class="form-control"
                           id="username"
                           name="username"
                           placeholder="Enter Username">
                </div>


                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password"
                           class="form-control"
                           id="password"
                           name="password"
                           placeholder="Enter Password">
                </div>



                <div class="form-group">
                    <label for="image">imagem</label>
                    <input type="text"
                           class="form-control"
                           id="image"
                           name="image"
                           placeholder="Enter Imagem">
                </div>



                <div class="form-group">
                    <label for="name">nome</label>
                    <input type="text"
                           class="form-control"
                           id="name"
                           name="name"
                           placeholder="Enter Nome">
                </div>



                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           placeholder="Enter Email">
                </div>



                <div class="form-group">
                    <label for="phone">Número</label>
                    <input type="number"
                           class="form-control"
                           id="phone"
                           name="phone"
                           placeholder="Enter Número">
                </div>



                <div class="form-group">
                    <label for="nif">nif</label>
                    <input type="number"
                           class="form-control"
                           id="nif"
                           name="nif"
                           placeholder="Enter Nif">
                </div>



                <div class="form-group">
                    <label for="postal_code">código postal</label>
                    <input type="text"
                           class="form-control"
                           id="postal_code"
                           name="postal_code"
                           placeholder="Enter Código Postal">
                </div>



                <div class="form-group">
                    <label for="birth">código postal</label>
                    <input type="text"
                           class="form-control"
                           id="birth"
                           name="postal_code"
                           placeholder="Enter Código Postal">
                </div>



                <div class="form-group">
                    <label for="genre">género</label>
                    <select class="form-control" id="genre" name="genre">
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                    </select>
                </div>



                <div class="form-group">
                    <label for="coutry">país</label>
                    <input type="text"
                           class="form-control"
                           id="coutry"
                           name="coutry"
                           placeholder="Enter País">
                </div>



                <div class="form-group">
                    <label for="city">cidade</label>
                    <input type="text"
                           class="form-control"
                           id="city"
                           name="city"
                           placeholder="Enter Cidade">
                </div>



                <div class="form-group">
                    <label for="locale">localidade</label>
                    <input type="text"
                           class="form-control"
                           id="locale"
                           name="locale"
                           placeholder="Enter Localidade">
                </div>



                <div class="form-group">
                    <label for="address">morada</label>
                    <input type="text"
                           class="form-control"
                           id="address"
                           name="address"
                           placeholder="Enter Morada">
                </div>



                <div class="form-group">
                    <label for="role">permissão</label>
                    <input type="text"
                           class="form-control"
                           id="role"
                           name="role"
                           placeholder="Enter Permissão">
                </div>

                <button type="submit"
                        class="btn btn-primary"
                        name="create">Create</button>
            </form>
        </div>
    </div>
</section>
</body>
</html>