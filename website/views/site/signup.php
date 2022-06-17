<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="pt" dir="ltr">
<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link href="<?= DIRPAGE ?>public/css/sigin.css" rel="stylesheet">
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
    <div class="title">Registo</div>
    <div class="content1">
        <form method="post" action="router.php?c=auth&a=save_signup">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Nome de Usuário:</span>
                    <input name="username" type="text"
                           maxlength="10"
                           placeholder="Inserir Nome de Usuário"
                           onkeydown="return /[a-zA-Z0-9]/i.test(event.key)"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['username']);} ?>">
                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('username'))) {
                            foreach ($users->errors->on('username') as $error) {
                                echo "<font color='red'>" . $error . "</font>" ;
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('username') . "</font>";
                        }
                    }
                    ?>
                </div>
                <div class="input-box">
                    <span class="details">Nome:</span>
                    <input name="name" type="text"
                           placeholder="Inserir Nome"
                           onkeydown="return /[a-zA-Z ]/i.test(event.key)"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['name']);} ?>">
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
                </div>
                <div class="input-box">
                    <span class="details">E-mail:</span>
                    <input name="email" type="text"
                           placeholder="Inserir E-mail"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['email']);} ?>">
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
                </div>
                <div class="input-box">
                    <span class="details">Número de Telemóvel:</span>
                    <input name="phone" type="number"
                           maxlength="9"
                           placeholder="Inserir Número de Telemóvel"
                           oninput="this.value=this.value.slice(0,this.maxLength)"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['phone']);} ?>">
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
                </div>
                <div class="input-box">
                    <span class="details">Nif:</span>
                    <input name="nif" type="number"
                           maxlength="9"
                           placeholder="Inserir Nif"
                           oninput="this.value=this.value.slice(0,this.maxLength)"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['nif']);} ?>">
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
                </div>
                <div class="input-box">
                    <span class="details">Data de Nascimento:</span>
                    <input name="birth" type="date"
                           placeholder="Inserir Código Postal"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['birth']);} ?>">
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
                </div>
                <div class="input-box">
                    <span class="details">Palavra-Passe:</span>
                    <input name="password" type="password"
                           placeholder="Inserir Palavra-Passe">
                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('password'))) {
                            foreach ($users->errors->on('password') as $error) {
                                echo "<font color='red'>" . $error . "</font>" ;
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('password') . "</font>";
                        }
                    }
                    ?>
                </div>
                <div class="input-box">
                    <span class="details">Confirmar Palavra-Passe:</span>
                    <input name="confirm_pass" type="password"
                           placeholder="Confirmar Palavra-Passe">
                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('confirm_pass'))) {
                            foreach ($users->errors->on('confirm_pass') as $error) {
                                echo "<font color='red'>" . $error . "</font>" ;
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('confirm_pass') . "</font>";
                        }
                    }
                    ?>
                </div>
                <div class="input-box">
                    <span class="details">Código Postal:</span>
                    <input name="postal_code" type="text"
                           maxlength="8"
                           placeholder="Inserir Código Postal"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['postal_code']);} ?>">
                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('postal_code'))) {
                            foreach ($users->errors->on('postal_code') as $error) {
                                echo "<font color='red'>" . $error . "</font>" ;
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('postal_code') . "</font>";
                        }
                    }
                    ?>
                </div>
                <div class="input-box">
                    <div class="form-group">
                        <label for="country">País:</label>
                        <select class="form-control" id="country" name="country" onchange="getCities()">
                            <option value="">Nenhum</option>
                        </select>
                    </div>
                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('country'))) {
                            foreach ($users->errors->on('country') as $error) {
                                echo "<font color='red'>" . $error . "</font>" ;
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('country') . "</font>";
                        }
                    }
                    ?>
                </div>
                <div class="input-box">
                    <div class="form-group">
                        <label for="city">Cidade:</label>
                        <select class="form-control" id="city" name="city">
                            <option value="">Nenhum</option>
                        </select>
                    </div>
                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('city'))) {
                            foreach ($users->errors->on('city') as $error) {
                                echo "<font color='red'>" . $error . "</font>" ;
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('city') . "</font>";
                        }
                    }
                    ?>
                </div>
                <div class="input-box">
                    <span class="details">Localidade:</span>
                    <input name="locale" type="text"
                           placeholder="Inserir Localidade"
                        <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['locale']);} ?>">
                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('locale'))) {
                            foreach ($users->errors->on('locale') as $error) {
                                echo "<font color='red'>" . $error . "</font>" ;
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('locale') . "</font>";
                        }
                    }
                    ?>
                </div>
                <div class="input-box">
                    <span class="details">Morada:</span>
                    <input name="address" type="text"
                           placeholder="Inserir Morada"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['address']);} ?>">
                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('address'))) {
                            foreach ($users->errors->on('address') as $error) {
                                echo "<font color='red'>" . $error . "</font>" ;
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('address') . "</font>";
                        }
                    }
                    ?>
                </div>
                <div class="input-box">
                    <span>Género:</span>
                    <br>
                    <select style=" height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
border-color: #9b59b6;" class="form-control" id="genre" name="genre">
                        <option value="">não pode estar vazio</option>
                        <option value="m">Masculino</option>
                        <option value="f">Feminino</option>
                    </select>
                    <br>
                    <?php
                    if (isset($users->errors)) {
                        if (is_array($users->errors->on('genre'))) {
                            foreach ($users->errors->on('genre') as $error) {
                                echo "<font color='red'>" . $error . "</font>" ;
                            }
                        } else {
                            echo "<font color='red'>" . $users->errors->on('genre') . "</font>";

                        }
                    }
                    ?>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    let selectElementCountry = document.getElementById('country');
    // Make a request for a user with a given ID
    axios.get('https://countriesnow.space/api/v0.1/countries/flag/images')
        .then(async function (response) {
            // handle success
            //console.log(response);
            const {data:{data: countries}} = await response;
            countries.map((country)=>{
                let option = document.createElement("OPTION");
                option.innerHTML = country.name;
                option.value = country.name;
                selectElementCountry.options.add(option);
            });
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        });

    function getCities(){
        let selectElementCity = document.getElementById('city');
        selectElementCity.innerHTML = null;
        axios.post('https://countriesnow.space/api/v0.1/countries/cities', {country:selectElementCountry.options[selectElementCountry.selectedIndex].value})
            .then(async function (response) {
                // handle success
                //console.log(response);
                const {data:{data: cities}} = await response;
                cities.map((city)=>{
                    let option = document.createElement("OPTION");
                    option.innerHTML = city;
                    option.value = city;
                    selectElementCity.options.add(option);
                });
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
    }
</script>

</body>
</html>
