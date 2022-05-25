<!DOCTYPE html>
<html>
<head>
    <title>Criar Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=enterprises&a=save" method="post" style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Criar Empresa</h4><hr><br>

                <div class="form-group">
                    <label for="social_designation">Designação Social:</label>
                    <input type="text"
                           class="form-control"
                           id="social_designation"
                           name="social_designation"
                           placeholder="Inserir Designação Social">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('social_designation'))) {
                        foreach ($users->errors->on('social_designation') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('social_designation')."</font>";
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
                    <input type="number"
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
                    <label for="country">País:</label>
                    <input type="text"
                           class="form-control"
                           id="country"
                           name="country"
                           placeholder="Inserir País">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('country'))) {
                        foreach ($users->errors->on('country') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('country')."</font>";
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
                    <label for="social_capital">Capital Social:</label>
                    <input type="text"
                           class="form-control"
                           id="social_capital"
                           name="social_capital"
                           placeholder="Inserir Capital Social">
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('social_capital'))) {
                        foreach ($users->errors->on('social_capital') as $error) {
                            echo "<font color='red'>" . $error ."</font>". '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('social_capital')."</font>";
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