<?php

if(!empty($_GET['id']))
{
    $id= $_GET['id'];

    $sqlSelect = "SELECT * FROM users WHERE id=$id";
}
?>
<!DOCTYPE html>

<html lang="pt" dir="ltr">
<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link href="<?= DIRPAGE ?>public/css/editperfil.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="
    height: 130vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
}">

<div class="container1">
    <div class="title">Editar perfil</div>
    <div class="content1">
        <form method="post" action="router.php?c=auth&a=save_editperfil">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">username</span>
                    <input name="username" type="text" placeholder="Inserir Username">

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('username'))) {
                            foreach ($users->errors->on('username') as $error) {
                                echo "<font color='red'>" . $error . "</font>" . '<br>';
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('username') . "</font>";
                        }
                    }
                    ?>
                </div>
                <div class="input-box">
                    <span class="details">nome</span>
                    <input name="name" type="text" placeholder="Inserir Nome">

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('name'))) {
                            foreach ($users->errors->on('name') as $error) {
                                echo "<font color='red'>" . $error . "</font>" . '<br>';
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('name') . "</font>";
                        }
                    }
                    ?>
                </div>

                <div class="input-box">
                    <span class="details">Email</span>
                    <input name="email" type="text" placeholder="Inserir E-mail">

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('email'))) {
                            foreach ($users->errors->on('email') as $error) {
                                echo "<font color='red'>" . $error . "</font>" . '<br>';
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('email') . "</font>";
                        }
                    }
                    ?>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input name="phone" type="number" placeholder="Inserir Número de Telemóvel">

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('phone'))) {
                            foreach ($users->errors->on('phone') as $error) {
                                echo "<font color='red'>" . $error . "</font>" . '<br>';
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('phone') . "</font>";
                        }
                    }
                    ?>
                </div>
                <div class="input-box">
                    <span class="details">nif</span>
                    <input name="nif" type="number" placeholder="Inserir Nif">

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('nif'))) {
                            foreach ($users->errors->on('nif') as $error) {
                                echo "<font color='red'>" . $error . "</font>" . '<br>';
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('nif') . "</font>";
                        }
                    }
                    ?>
                </div>
                <div class="input-box">
                    <span class="details">birth</span>
                    <input name="birth" type="date" placeholder="Inserir Código Postal">

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('birth'))) {
                            foreach ($users->errors->on('birth') as $error) {
                                echo "<font color='red'>" . $error . "</font>" . '<br>';
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('birth') . "</font>";
                        }
                    }
                    ?>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input name="password" type="password" placeholder="Inserir Password">

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('password'))) {
                            foreach ($users->errors->on('password') as $error) {
                                echo "<font color='red'>" . $error . "</font>" . '<br>';
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('password') . "</font>";
                        }
                    }
                    ?></div>

                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input name="confirm_pass" type="password" placeholder="Confirmar Password">

                </div>
                <div class="input-box">
                    <span class="details">postal_code</span>
                    <input name="postal_code" type="text" placeholder="Inserir Código Postal">

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('postal_code'))) {
                            foreach ($users->errors->on('postal_code') as $error) {
                                echo "<font color='red'>" . $error . "</font>" . '<br>';
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('postal_code') . "</font>";
                        }
                    }
                    ?>
                </div>
                <div class="input-box">
                    <span class="details">coutry</span>
                    <input name="country" type="text" placeholder="Inserir País">

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('country'))) {
                            foreach ($users->errors->on('country') as $error) {
                                echo "<font color='red'>" . $error . "</font>" . '<br>';
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('country') . "</font>";
                        }
                    }
                    ?>
                </div>

                <div class="input-box">
                    <span class="details">city</span>
                    <input name="city" type="text" placeholder="Inserir Cidade">

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('city'))) {
                            foreach ($users->errors->on('city') as $error) {
                                echo "<font color='red'>" . $error . "</font>" . '<br>';
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('city') . "</font>";
                        }
                    }
                    ?>
                </div>

                <div class="input-box">
                    <span class="details">locale</span>
                    <input name="locale" type="text" placeholder="Inserir Localidade">

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('locale'))) {
                            foreach ($users->errors->on('locale') as $error) {
                                echo "<font color='red'>" . $error . "</font>" . '<br>';
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('locale') . "</font>";
                        }
                    }
                    ?>
                </div>
                <div class="input-box">
                    <span class="details">address</span>
                    <input name="address" type="text" placeholder="Inserir Morada">
                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('address'))) {
                            foreach ($users->errors->on('address') as $error) {
                                echo "<font color='red'>" . $error . "</font>" . '<br>';
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('address') . "</font>";
                        }
                    }
                    ?>
                </div>
                <div class="input-box">
                    <span class="details">imagem</span>
                    <input name="image" type="text" placeholder="Inserir Imagem">

                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('image'))) {
                            foreach ($users->errors->on('image') as $error) {
                                echo "<font color='red'>" . $error . "</font>" . '<br>';
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('image') . "</font>";
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="gender-details">
                <input type="radio" name="genre" value="m" id="dot-1">
                <input type="radio" name="genre" value="f" id="dot-2">
                <span>Gender</span>

                <div class="category">

                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Female</span>
                    </label>

                </div>
                <?php
                if (isset($users->errors)) {
                    if (is_array($users->errors->on('genre'))) {
                        foreach ($users->errors->on('genre') as $error) {
                            echo "<font color='red'>" . $error . "</font>" . '<br>';
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('genre') . "</font>";

                    }
                }
                ?>

                <div class="button" href="backoffice\users\index.php?id=$user['id']">
                    <input type="submit" value="Guardar">
                </div>
        </form>
    </div>
</div>

</body>
</html>
