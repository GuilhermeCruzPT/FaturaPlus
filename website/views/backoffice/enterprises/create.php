
<!DOCTYPE html>
<html >
<head>
    <title >Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRPAGE ?>public/css/backoffice.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="box" style=" margin: 200px;">

    <form action="router.php?c=bill&a=save" method="post" style="
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
            <label for="Designação_social">designação_social</label>
            <input type="text"
                   class="form-control"
                   id="social_designation"
                   name="designação_social"
                   placeholder="Enter designação_social">
        </div>


        <div class="form-group">
            <label for="Email">email</label>
            <input type="text"
                   class="form-control"
                   id="email"
                   name="email"
                   placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="Phone">phone</label>
            <input type="text"
                   class="form-control"
                   id="phone"
                   name="phone"
                   placeholder="Enter phone">
        </div>

        <div class="form-group">
            <label for="NIF">nif</label>
            <input type="text"
                   class="form-control"
                   id="nif"
                   name="nif"
                   placeholder="Enter nif">
        </div>



        <div class="form-group">
            <label for="Postal_code">codigo_postal</label>
            <input type="number"
                   class="form-control"
                   id="postal_code"
                   name="codigo_postal"
                   placeholder="Enter Código postal">
        </div>


        <div class="form-group">
            <label for="country">País</label>
            <input type="text"
                   class="form-control"
                   id="country"
                   name="country"
                   placeholder="Enter country">
        </div>

        <div class="form-group">
            <label for="city">Cidade</label>
            <input type="text"
                   class="form-control"
                   id="city"
                   name="city"
                   placeholder="Enter city">
        </div>



        <div class="form-group">
            <label for="locale">Localidade</label>
            <input type="text"
                   class="form-control"
                   id="locale"
                   name="locale"
                   placeholder="Enter locale">
        </div>


        <div class="form-group">
            <label for="address">Morada</label>
            <input type="text"
                   class="form-control"
                   id="address"
                   name="address"
                   placeholder="Enter address">
        </div>


        <div class="form-group">
            <label for="social_capital">Capital social</label>
            <input type="text"
                   class="form-control"
                   id="social_capital"
                   name="social_capital"
                   placeholder="Enter social_capital">
        </div>


        <button type="submit"
                class="btn btn-primary"
                name="create">Create</button>
    </form>
</div>
</div>
</body>
</html>