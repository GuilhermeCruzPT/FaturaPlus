<!DOCTYPE html>
<html>
<head>
    <title>Editar Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=enterprises&a=update&id=<?= $enterprise->id ?>" method="post"
                  style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Editar Empresa</h4><hr><br>

                <div class="form-group">
                    <label for="social_designation">Designação Social:</label>
                    <input type="text"
                           class="form-control"
                           id="social_designation"
                           name="social_designation"
                           placeholder="Inserir Designação Social"
                           value="<?= $enterprise->social_designation ?>">
                </div>

                <?php
                if(isset($enterprise->errors)) {
                    if (is_array($enterprise->errors->on('social_designation'))) {
                        foreach ($enterprise->errors->on('social_designation') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $enterprise->errors->on('social_designation') . "</font>";
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
                           value="<?= $enterprise->email ?>">
                </div>

                <?php
                if(isset($enterprise->errors)) {
                    if (is_array($enterprise->errors->on('email'))) {
                        foreach ($enterprise->errors->on('email') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $enterprise->errors->on('email') . "</font>";
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
                           value="<?= $enterprise->phone ?>"
                           oninput="this.value=this.value.slice(0,this.maxLength)"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                </div>

                <?php
                if(isset($enterprise->errors)) {
                    if (is_array($enterprise->errors->on('phone'))) {
                        foreach ($enterprise->errors->on('phone') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $enterprise->errors->on('phone') . "</font>";
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
                           value="<?= $enterprise->nif ?>"
                           oninput="this.value=this.value.slice(0,this.maxLength)"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                </div>

                <?php
                if(isset($enterprise->errors)) {
                    if (is_array($enterprise->errors->on('nif'))) {
                        foreach ($enterprise->errors->on('nif') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $enterprise->errors->on('nif') . "</font>";
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
                           maxlength="8"
                           value="<?= $enterprise->postal_code ?>">
                </div>

                <?php
                if(isset($enterprise->errors)) {
                    if (is_array($enterprise->errors->on('postal_code'))) {
                        foreach ($enterprise->errors->on('postal_code') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $enterprise->errors->on('postal_code') . "</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="country">País:</label>
                    <select class="form-control" id="country" name="country" onchange="getCities()"></select>
                </div>

                <?php
                if(isset($enterprise->errors)) {
                    if (is_array($enterprise->errors->on('country'))) {
                        foreach ($enterprise->errors->on('country') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $enterprise->errors->on('country') . "</font>";
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="city">Cidade:</label>
                    <select class="form-control" id="city" name="city"></select>
                </div>

                <?php
                if(isset($enterprise->errors)) {
                    if (is_array($enterprise->errors->on('city'))) {
                        foreach ($enterprise->errors->on('city') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $enterprise->errors->on('city') . "</font>";
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
                           value="<?= $enterprise->locale ?>">
                </div>

                <?php
                if(isset($enterprise->errors)) {
                    if (is_array($enterprise->errors->on('locale'))) {
                        foreach ($enterprise->errors->on('locale') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $enterprise->errors->on('locale') . "</font>";
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
                           value="<?= $enterprise->address ?>">
                </div>

                <?php
                if(isset($enterprise->errors)) {
                    if (is_array($enterprise->errors->on('address'))) {
                        foreach ($enterprise->errors->on('address') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $enterprise->errors->on('address') . "</font>";
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
                           placeholder="Inserir Capital Social"
                           maxlength="14"
                           value="<?= $enterprise->social_capital ?>"
                           oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                </div>

                <?php
                if(isset($enterprise->errors)) {
                    if (is_array($enterprise->errors->on('social_capital'))) {
                        foreach ($enterprise->errors->on('social_capital') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $enterprise->errors->on('social_capital') . "</font>";
                    }
                }
                ?>

                <br><br>

                <button type="submit"
                        class="btn btn-primary"
                        name="update">Atualizar</button>

                <a href="router.php?c=enterprises&a=index"
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
    let pais = '<?= $enterprise->country; ?>';
    // Make a request for a user with a given ID
    axios.get('https://countriesnow.space/api/v0.1/countries/flag/images')
        .then(async function (response) {
            // handle success
            //console.log(response);
            const {data:{data: countries}} = await response;
            countries.map((country, index)=>{
                //console.log(country.flag);
                let option = document.createElement("OPTION");
                option.innerHTML = country.name;
                option.value = country.name;
                selectElementCountry.options.add(option);
                //console.log(pais);
                //console.log(country.name);
                if (pais == country.name) {
                    selectElementCountry.selectedIndex = index;
                }
            });
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        });

    function getCities(){
        let selectElementCity = document.getElementById('city');
        selectElementCity.innerHTML = null;
        axios.post('https://countriesnow.space/api/v0.1/countries/cities', {country:selectElementCountry.options[selectElementCountry.selectedIndex] ? selectElementCountry.options[selectElementCountry.selectedIndex].value : pais})
            .then(async function (response) {
                // handle success
                //console.log(response);
                let cidade = '<?= $enterprise->city; ?>';
                const {data:{data: cities}} = await response;
                cities.map((city, index)=>{
                    let option = document.createElement("OPTION");
                    option.innerHTML = city;
                    option.value = city;
                    selectElementCity.options.add(option);
                    if (cidade == city) {
                        selectElementCity.selectedIndex = index;
                    }
                });
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
    }

    window.onload = function(){
        getCities();
    }
</script>
</body>
</html>