<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<body>


<!-- Modal -->
<div class="modal fade" id="Modalclient" style="width: 100%;" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Criar utilizador</h4>
                <button type="button" class="close" data-dismiss="modal"
                        style="size: A4; display:flex; justify-content:flex-end; width:100%; padding:0;">&times;
                </button>
            </div>
            <div class="modal-body">
                <form id="contactForm" action="router.php?c=users&a=save&p=popup" method="post">


                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text"
                               style=" height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
border-color: #006d77;
"
                               id="username"
                               name="username"
                               maxlength="10"
                               placeholder="Inserir Username"
                               onkeydown="return /[a-zA-Z0-9]/i.test(event.key)"
                            <?php
                            if (isset($users->errors)) { ?>
                               value="<?php
                               print_r($attributes_client['username']);
                               } ?>">
                    </div>

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('username'))) {
                            foreach ($users->errors->on('username') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('username') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password"
                               style=" height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
border-color: #006d77;
"
                               id="password"
                               name="password"
                               placeholder="Inserir Password">
                    </div>

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('password'))) {
                            foreach ($users->errors->on('password') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('password') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text"
                               style=" height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
border-color: #006d77;
"
                               id="name"
                               name="name"
                               placeholder="Inserir Nome"
                               onkeydown="return /[a-zA-Z ]/i.test(event.key)"
                            <?php
                            if (isset($users->errors)) { ?>
                               value="<?php
                               print_r($attributes_client['name']);
                               } ?>">
                    </div>

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('name'))) {
                            foreach ($users->errors->on('name') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('name') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email"
                               style=" height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
border-color: #006d77;
"
                               id="email"
                               name="email"
                               placeholder="Inserir E-mail"
                            <?php
                            if (isset($users->errors)) { ?>
                               value="<?php
                               print_r($attributes_client['email']);
                               } ?>">
                    </div>

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('email'))) {
                            foreach ($users->errors->on('email') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('email') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="phone">Número de Telemóvel:</label>
                        <input type="number"
                               id="phone"
                               name="phone"
                               style=" height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
border-color: #006d77;
"
                               maxlength="9"
                               placeholder="Inserir Número de Telemóvel"
                               oninput="this.value=this.value.slice(0,this.maxLength)"
                               onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
                            <?php
                            if (isset($users->errors)) { ?>
                               value="<?php
                               print_r($attributes_client['phone']);
                               } ?>">
                    </div>

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('phone'))) {
                            foreach ($users->errors->on('phone') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('phone') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="nif">Nif:</label>
                        <input type="number"
                               style=" height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
border-color: #006d77;
"
                               id="nif"
                               name="nif"
                               maxlength="9"
                               placeholder="Inserir Nif"
                               oninput="this.value=this.value.slice(0,this.maxLength)"
                               onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
                            <?php
                            if (isset($users->errors)) { ?>
                               value="<?php
                               print_r($attributes_client['nif']);
                               } ?>">
                    </div>

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('nif'))) {
                            foreach ($users->errors->on('nif') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('nif') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="postal_code">Código Postal:</label>
                        <input type="text"
                               style=" height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
border-color: #006d77;
"
                               id="postal_code"
                               name="postal_code"
                               maxlength="8"
                               placeholder="Inserir Código Postal"
                            <?php
                            if (isset($users->errors)) { ?>
                               value="<?php
                               print_r($attributes_client['postal_code']);
                               } ?>">
                    </div>

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('postal_code'))) {
                            foreach ($users->errors->on('postal_code') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('postal_code') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="birth">Data de Nascimento:</label>
                        <input type="date"
                               style=" height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
border-color: #006d77;
"
                               id="birth"
                               name="birth"
                               placeholder="Inserir Data de Nascimento"
                            <?php
                            if (isset($users->errors)) { ?>
                               value="<?php
                               print_r($attributes_client['birth']);
                               } ?>">
                    </div>

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('birth'))) {
                            foreach ($users->errors->on('birth') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('birth') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="genre">Género:</label>
                        <select style=" height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
border-color: #006d77;
" id="genre" name="genre">
                            <option value="">Nenhum</option>
                            <option value="m">Masculino</option>
                            <option value="f">Feminino</option>
                        </select>
                    </div>

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('genre'))) {
                            foreach ($users->errors->on('genre') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('genre') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="country">País:</label>
                        <input type="text"
                               style=" height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
border-color: #006d77;
"
                               id="country"
                               name="country"
                               placeholder="Inserir País"
                            <?php
                            if (isset($users->errors)) { ?>
                               value="<?php
                               print_r($attributes_client['country']);
                               } ?>">
                    </div>

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('country'))) {
                            foreach ($users->errors->on('country') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('country') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="city">Cidade:</label>
                        <input type="text"
                               style=" height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
border-color: #006d77;
"
                               id="city"
                               name="city"
                               placeholder="Inserir Cidade"
                            <?php
                            if (isset($users->errors)) { ?>
                               value="<?php
                               print_r($attributes_client['city']);
                               } ?>">
                    </div>

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('city'))) {
                            foreach ($users->errors->on('city') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('city') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="locale">Localidade:</label>
                        <input type="text"
                               style=" height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
border-color: #006d77;
"
                               id="locale"
                               name="locale"
                               placeholder="Inserir Localidade"
                            <?php
                            if (isset($users->errors)) { ?>
                               value="<?php
                               print_r($attributes_client['locale']);
                               } ?>">
                    </div>

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('locale'))) {
                            foreach ($users->errors->on('locale') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('locale') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="address">Morada:</label>
                        <input type="text"
                               style=" height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
border-color: #006d77;
"
                               id="address"
                               name="address"
                               placeholder="Inserir Morada"
                            <?php
                            if (isset($users->errors)) { ?>
                               value="<?php
                               print_r($attributes_client['address']);
                               } ?>">
                    </div>

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('address'))) {
                            foreach ($users->errors->on('address') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('address') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="role">Permissão:</label>
                        <select id="role" style=" height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
border-color: #006d77;
" name="role">
                            <option value="">Nenhum</option>
                            <option value="c">Cliente</option>
                            <?php if ($_SESSION["permission"] == 'a') { ?>
                                <option value="f">Funcionário</option>
                                <option value="a">Administrador</option>
                            <?php } ?>
                        </select>
                    </div>

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('role'))) {
                            foreach ($users->errors->on('role') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('role') . "</font>";
                        }
                    }
                    ?>

            </div>
            <div class="modal-footer">
                <button type="submit"
                        class="btn btn-primary"
                        name="create">Criar
                </button>

                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>
