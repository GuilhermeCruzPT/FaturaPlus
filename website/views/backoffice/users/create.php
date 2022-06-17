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
                    <label for="username">Nome de Usuário:</label>
                    <input type="text"
                           class="form-control"
                           id="username"
                           name="username"
                           maxlength="10"
                           placeholder="Inserir Nome de Usuário"
                           onkeydown="return /[a-zA-Z0-9]/i.test(event.key)"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['username']);} ?>">
                </div>

                <?php
                if(isset($users->errors)) {
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
                    <label for="password">Palavra-Passe:</label>
                    <input type="password"
                           class="form-control"
                           id="password"
                           name="password"
                           placeholder="Inserir Palavra-Passe">
                </div>

                <?php
                if(isset($users->errors)) {
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
                           class="form-control"
                           id="name"
                           name="name"
                           placeholder="Inserir Nome"
                           onkeydown="return /[a-zA-Z ]/i.test(event.key)"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['name']);} ?>">
                </div>

                <?php
                if(isset($users->errors)) {
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
                           class="form-control"
                           id="email"
                           name="email"
                           placeholder="Inserir E-mail"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['email']);} ?>">
                </div>

                <?php
                if(isset($users->errors)) {
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
                           class="form-control"
                           id="phone"
                           name="phone"
                           maxlength="9"
                           placeholder="Inserir Número de Telemóvel"
                           oninput="this.value=this.value.slice(0,this.maxLength)"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['phone']);} ?>">
                </div>

                <?php
                if(isset($users->errors)) {
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
                           class="form-control"
                           id="nif"
                           name="nif"
                           maxlength="9"
                           placeholder="Inserir Nif"
                           oninput="this.value=this.value.slice(0,this.maxLength)"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['nif']);} ?>">
                </div>

                <?php
                if(isset($users->errors)) {
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
                           class="form-control"
                           id="postal_code"
                           name="postal_code"
                           maxlength="8"
                           placeholder="Inserir Código Postal"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['postal_code']);} ?>">
                </div>

                <?php
                if(isset($users->errors)) {
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
                           class="form-control"
                           id="birth"
                           name="birth"
                           placeholder="Inserir Data de Nascimento"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['birth']);} ?>">
                </div>

                <?php
                if(isset($users->errors)) {
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
                    <select class="form-control" id="country" name="country" onchange="getCities()">
                        <option value="">Nenhum</option>
                    </select>
                </div>

                <?php
                if(isset($users->errors)) {
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
                    <select class="form-control" id="city" name="city">
                        <option value="">Nenhum</option>
                    </select>
                </div>

                <?php
                if(isset($users->errors)) {
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
                           class="form-control"
                           id="locale"
                           name="locale"
                           placeholder="Inserir Localidade"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['locale']);} ?>">
                </div>

                <?php
                if(isset($users->errors)) {
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
                           class="form-control"
                           id="address"
                           name="address"
                           placeholder="Inserir Morada"
                           <?php if(isset($users->errors)) { ?>
                           value="<?php print_r($attributes['address']);} ?>">
                </div>

                <?php
                if(isset($users->errors)) {
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
                    <select class="form-control" id="role" name="role">
                        <option value="">Nenhum</option>
                        <option value="c">Cliente</option>
                        <?php if ($_SESSION["permission"] == 'a') { ?>
                        <option value="f">Funcionário</option>
                        <option value="a">Administrador</option>
                        <?php } ?>
                    </select>
                </div>

                <?php
                if(isset($users->errors)) {
                    if (is_array($users->errors->on('role'))) {
                        foreach ($users->errors->on('role') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $users->errors->on('role') . "</font>";
                    }
                }
                ?>

                <br><br>

                <button type="submit"
                        class="btn btn-primary"
                        name="create">Criar</button>

                <a href="router.php?c=users&a=index"
                   class="btn btn-secondary"
                   role="button"
                   aria-pressed="true">Voltar</a>

            </form>
        </div>
    </div>
</section>

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