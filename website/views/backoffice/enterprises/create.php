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
                if(isset($enterprises->errors)) {
                    if (is_array($enterprises->errors->on('social_designation'))) {
                        foreach ($enterprises->errors->on('social_designation') as $error) {
                            echo "<font color='red'>" . $error ."</font>" . '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $enterprises->errors->on('social_designation') . "</font>";
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
                if(isset($enterprises->errors)) {
                    if (is_array($enterprises->errors->on('email'))) {
                        foreach ($enterprises->errors->on('email') as $error) {
                            echo "<font color='red'>" . $error . "</font>" . '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $enterprises->errors->on('email') . "</font>";
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
                           maxlength="9"
                           placeholder="Inserir Número de Telemóvel"
                           oninput="this.value=this.value.slice(0,this.maxLength)"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                </div>

                <?php
                if(isset($enterprises->errors)) {
                    if (is_array($enterprises->errors->on('phone'))) {
                        foreach ($enterprises->errors->on('phone') as $error) {
                            echo "<font color='red'>" . $error . "</font>" . '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $enterprises->errors->on('phone') . "</font>";
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
                           maxlength="9"
                           placeholder="Inserir Nif"
                           oninput="this.value=this.value.slice(0,this.maxLength)"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                </div>

                <?php
                if(isset($enterprises->errors)) {
                    if (is_array($enterprises->errors->on('nif'))) {
                        foreach ($enterprises->errors->on('nif') as $error) {
                            echo "<font color='red'>" . $error . "</font>" . '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $enterprises->errors->on('nif') . "</font>";
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
                           maxlength="8"
                           placeholder="Inserir Código Postal">
                </div>

                <?php
                if(isset($enterprises->errors)) {
                    if (is_array($enterprises->errors->on('postal_code'))) {
                        foreach ($enterprises->errors->on('postal_code') as $error) {
                            echo "<font color='red'>" . $error . "</font>" . '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $enterprises->errors->on('postal_code') . "</font>";
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
                if(isset($enterprises->errors)) {
                    if (is_array($enterprises->errors->on('country'))) {
                        foreach ($enterprises->errors->on('country') as $error) {
                            echo "<font color='red'>" . $error . "</font>" . '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $enterprises->errors->on('country') . "</font>";
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
                if(isset($enterprises->errors)) {
                    if (is_array($enterprises->errors->on('city'))) {
                        foreach ($enterprises->errors->on('city') as $error) {
                            echo "<font color='red'>" . $error . "</font>" . '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $enterprises->errors->on('city') . "</font>";
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
                if(isset($enterprises->errors)) {
                    if (is_array($enterprises->errors->on('locale'))) {
                        foreach ($enterprises->errors->on('locale') as $error) {
                            echo "<font color='red'>" . $error . "</font>" . '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $enterprises->errors->on('locale') . "</font>";
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
                if(isset($enterprises->errors)) {
                    if (is_array($enterprises->errors->on('address'))) {
                        foreach ($enterprises->errors->on('address') as $error) {
                            echo "<font color='red'>" . $error ."</font>" . '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $enterprises->errors->on('address') . "</font>";
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
                           maxlength="14"
                           placeholder="Inserir Capital Social"
                           oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                </div>

                <?php
                if(isset($enterprises->errors)) {
                    if (is_array($enterprises->errors->on('social_capital'))) {
                        foreach ($enterprises->errors->on('social_capital') as $error) {
                            echo "<font color='red'>" . $error . "</font>" . '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $enterprises->errors->on('social_capital') . "</font>";
                    }
                }
                ?>

                <br><br>

                <button type="submit"
                        class="btn btn-primary"
                        name="create">Criar</button>

            </form>
        </div>
    </div>
</section>
</body>
</html>