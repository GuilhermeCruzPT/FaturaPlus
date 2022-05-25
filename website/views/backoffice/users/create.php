<!DOCTYPE html>
<html>
<head>
    <title>Criar Utilizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=users&a=save" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Criar Utilizador</h4><hr><br>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text"
                           class="form-control"
                           id="username"
                           name="username"
                           placeholder="Inserir Username">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('username'))) {
                        foreach ($users->errors->on('username') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('username')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password"
                           class="form-control"
                           id="password"
                           name="password"
                           placeholder="Inserir Password">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('password'))) {
                        foreach ($users->errors->on('password') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('password')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="image">Imagem:</label>
                    <input type="text"
                           class="form-control"
                           id="image"
                           name="image"
                           placeholder="Inserir Imagem">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('image'))) {
                        foreach ($users->errors->on('image') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('image')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text"
                           class="form-control"
                           id="name"
                           name="name"
                           placeholder="Inserir Nome">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('name'))) {
                        foreach ($users->errors->on('name') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('name')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           placeholder="Inserir E-mail">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('email'))) {
                        foreach ($users->errors->on('email') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('email')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="phone">Número de Telemóvel:</label>
                    <input type="number"
                           class="form-control"
                           id="phone"
                           name="phone"
                           placeholder="Inserir Número de Telemóvel">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('phone'))) {
                        foreach ($users->errors->on('phone') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('phone')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="nif">Nif:</label>
                    <input type="number"
                           class="form-control"
                           id="nif"
                           name="nif"
                           placeholder="Inserir Nif">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('nif'))) {
                        foreach ($users->errors->on('nif') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('nif')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="postal_code">Código Postal:</label>
                    <input type="text"
                           class="form-control"
                           id="postal_code"
                           name="postal_code"
                           placeholder="Inserir Código Postal">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('postal_code'))) {
                        foreach ($users->errors->on('postal_code') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('postal_code')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="birth">Data de Nascimento:</label>
                    <input type="date"
                           class="form-control"
                           id="birth"
                           name="birth"
                           placeholder="Inserir Código Postal">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('birth'))) {
                        foreach ($users->errors->on('birth') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('birth')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="genre">Género:</label>
                    <select class="form-control" id="genre" name="genre">
                        <option value="">Nenhum</option>
                        <option value="m">Masculino</option>
                        <option value="f">Feminino</option>
                    </select>
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('genre'))) {
                        foreach ($users->errors->on('genre') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('genre')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="country">País:</label>
                    <input type="text"
                           class="form-control"
                           id="country"
                           name="country"
                           placeholder="Inserir País">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('coutry'))) {
                        foreach ($users->errors->on('coutry') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('coutry')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="city">Cidade:</label>
                    <input type="text"
                           class="form-control"
                           id="city"
                           name="city"
                           placeholder="Inserir Cidade">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('city'))) {
                        foreach ($users->errors->on('city') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('city')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="locale">Localidade:</label>
                    <input type="text"
                           class="form-control"
                           id="locale"
                           name="locale"
                           placeholder="Inserir Localidade">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('locale'))) {
                        foreach ($users->errors->on('locale') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('locale')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="address">Morada:</label>
                    <input type="text"
                           class="form-control"
                           id="address"
                           name="address"
                           placeholder="Inserir Morada">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('address'))) {
                        foreach ($users->errors->on('address') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('address')."</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="role">Permissão:</label>
                    <input type="text"
                           class="form-control"
                           id="role"
                           name="role"
                           placeholder="Inserir Permissão">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('role'))) {
                        foreach ($users->errors->on('role') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('role')."</font>";
                    }
                }
                ?>

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