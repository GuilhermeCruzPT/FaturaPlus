<!DOCTYPE html>
<html>
<head>
    <title>Editar Utilizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=users&a=update&id=<?= $user->id ?>" method="post"
                  style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Editar Utilizador</h4><hr><br>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text"
                           class="form-control"
                           id="username"
                           name="username"
                           maxlength="10"
                           placeholder="Inserir Username"
                           value="<?= $user->username ?>"
                           onkeydown="return /[a-zA-Z0-9]/i.test(event.key)">
                </div>

                <?php
                if(isset($user->errors)) {
                    if (is_array($user->errors->on('username'))) {
                        foreach ($user->errors->on('username') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $user->errors->on('username') . "</font>";
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
                    if (isset($user->errors)) {
                        if (is_array($user->errors->on('password'))) {
                            foreach ($user->errors->on('password') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        }
                        else if ($user->errors->on('password')) {
                            echo "<font color='red'>" . $user->errors->on('password') . "</font>";
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
                           placeholder="Inserir Nome"
                           value="<?= $user->name ?>">
                </div>

                <?php
                if(isset($user->errors)) {
                    if (is_array($user->errors->on('name'))) {
                        foreach ($user->errors->on('name') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $user->errors->on('name') . "</font>";
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
                           placeholder="Inserir E-mail"
                           value="<?= $user->email ?>">
                </div>

                <?php
                if(isset($user->errors)) {
                    if (is_array($user->errors->on('email'))) {
                        foreach ($user->errors->on('email') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $user->errors->on('email') . "</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="phone">Número:</label>
                    <input type="number"
                           class="form-control"
                           id="phone"
                           name="phone"
                           placeholder="Inserir Número"
                           value="<?= $user->phone ?>">
                </div>

                <?php
                if(isset($user->errors)) {
                    if (is_array($user->errors->on('phone'))) {
                        foreach ($user->errors->on('phone') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $user->errors->on('phone') . "</font>";
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
                           placeholder="Inserir Nif"
                           value="<?= $user->nif ?>">
                </div>

                <?php
                if(isset($user->errors)) {
                    if (is_array($user->errors->on('nif'))) {
                        foreach ($user->errors->on('nif') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $user->errors->on('nif') . "</font>";
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
                           placeholder="Inserir Código Postal"
                           value="<?= $user->postal_code ?>">
                </div>

                <?php
                if(isset($user->errors)) {
                    if (is_array($user->errors->on('postal_code'))) {
                        foreach ($user->errors->on('postal_code') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $user->errors->on('postal_code') . "</font>";
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
                           placeholder="Inserir Data de Nascimento"
                           value="<?= date_format($user->birth, 'Y-m-d') ?>">
                </div>

                <?php
                if(isset($user->errors)) {
                    if (is_array($user->errors->on('birth'))) {
                        foreach ($user->errors->on('birth') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $user->errors->on('birth') . "</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="genre">Género:</label>
                    <select class="form-control" id="genre" name="genre">
                        <option value="m" <?= $user->genre == 'm' ? 'selected' : '' ?>>Masculino</option>
                        <option value="f" <?= $user->genre == 'f' ? 'selected' : '' ?>>Feminino</option>
                    </select>
                </div>

                <?php
                if(isset($user->errors)) {
                    if (is_array($user->errors->on('genre'))) {
                        foreach ($user->errors->on('genre') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $user->errors->on('genre') . "</font>";
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
                           placeholder="Inserir País"
                           value="<?= $user->country ?>">
                </div>

                <?php
                if(isset($user->errors)) {
                    if (is_array($user->errors->on('country'))) {
                        foreach ($user->errors->on('country') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $user->errors->on('country') . "</font>";
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
                           placeholder="Inserir Cidade"
                           value="<?= $user->city ?>">
                </div>

                <?php
                if(isset($user->errors)) {
                    if (is_array($user->errors->on('city'))) {
                        foreach ($user->errors->on('city') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $user->errors->on('city') . "</font>";
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
                           placeholder="Inserir Localidade"
                           value="<?= $user->locale ?>">
                </div>

                <?php
                if(isset($user->errors)) {
                    if (is_array($user->errors->on('locale'))) {
                        foreach ($user->errors->on('locale') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $user->errors->on('locale') . "</font>";
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
                           placeholder="Inserir Morada"
                           value="<?= $user->address ?>">
                </div>

                <?php
                if(isset($user->errors)) {
                    if (is_array($user->errors->on('address'))) {
                        foreach ($user->errors->on('address') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $user->errors->on('address') . "</font>";
                    }
                }
                ?>

                <br>
                <?php if ($_SESSION["username"] == $user->username && $_SESSION["permission"] == 'f') { ?>
                <div class="form-group">
                    <label for="role">Permissão:</label>
                    <select class="form-control" id="role" name="role">
                            <option value="f" <?= $user->role == 'f' ? 'selected' : '' ?>>Funcionário</option>
                    </select>
                </div>
                <?php } else { ?>
                <div class="form-group">
                    <label for="role">Permissão:</label>
                    <select class="form-control" id="role" name="role">
                        <option value="c" <?= $user->role == 'c' ? 'selected' : '' ?>>Cliente</option>
                        <?php if ($_SESSION["permission"] == 'a') { ?>
                            <option value="f" <?= $user->role == 'f' ? 'selected' : '' ?>>Funcionário</option>
                            <option value="a" <?= $user->role == 'a' ? 'selected' : '' ?>>Administrador</option>
                        <?php } ?>
                    </select>
                </div>
                <?php } ?>

                <?php
                if(isset($user->errors)) {
                    if (is_array($user->errors->on('role'))) {
                        foreach ($user->errors->on('role') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $user->errors->on('role') . "</font>";
                    }
                }
                ?>

                <br><br>

                <button type="submit"
                        class="btn btn-primary"
                        name="update">Atualizar</button>

                <a href="router.php?c=users&a=index"
                   class=" btn btn-primary btn-back"
                   role="button"
                   aria-pressed="true">Voltar</a>

            </form>
        </div>
    </div>
</section>
</body>
</html>