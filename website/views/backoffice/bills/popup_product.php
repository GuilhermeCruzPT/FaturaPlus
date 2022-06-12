<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<body>

<!-- Modal -->
<div class="modal fade" id="Modalproduct" style="width: 100%;" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Criar produto</h4>
                <button type="button" class="close" data-dismiss="modal"
                        style="size: A4; display:flex; justify-content:flex-end; width:100%; padding:0;">&times;
                </button>
            </div>
            <div class="modal-body">
                <form id="contactForm" action="router.php?c=products&a=save&p1=popup" method="post">


                    <div class="form-group">
                        <label for="reference">Referência:</label>
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
                               class="form-control"
                               id="reference"
                               name="reference"
                               maxlength="6"
                               placeholder="Inserir Referência"
                               oninput="this.value=this.value.slice(0,this.maxLength)"
                               onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
                            <?php
                            if (isset($products->errors)) { ?>
                               value="<?php
                               print_r($attributes_product['reference']);
                               } ?>">
                    </div>

                    <?php
                    if (isset($products->errors)) {
                        if (is_array($products->errors->on('reference'))) {
                            foreach ($products->errors->on('reference') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $products->errors->on('reference') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="title">Título:</label>
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
                               class="form-control"
                               id="title"
                               name="title"
                               placeholder="Inserir Título"
                               onkeydown="return /[a-zA-Z ]/i.test(event.key)"
                            <?php
                            if (isset($products->errors)) { ?>
                               value="<?php
                               print_r($attributes_product['title']);
                               } ?>">
                    </div>

                    <?php
                    if (isset($products->errors)) {
                        if (is_array($products->errors->on('title'))) {
                            foreach ($products->errors->on('title') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $products->errors->on('title') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="description">Descrição:</label>
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
                               class="form-control"
                               id="description"
                               name="description"
                               placeholder="Inserir Descrição"
                            <?php
                            if (isset($products->errors)) { ?>
                               value="<?php
                               print_r($attributes_product['description']);
                               } ?>">
                    </div>

                    <?php
                    if (isset($products->errors)) {
                        if (is_array($products->errors->on('description'))) {
                            foreach ($products->errors->on('description') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $products->errors->on('description') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="price">Preço:</label>
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
                               class="form-control"
                               id="price"
                               name="price"
                               placeholder="Inserir Preço"
                               maxlength="14"
                               oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                            <?php
                            if (isset($products->errors)) { ?>
                               value="<?php
                               print_r($attributes_product['price']);
                               } ?>">
                    </div>

                    <?php
                    if (isset($products->errors)) {
                        if (is_array($products->errors->on('price'))) {
                            foreach ($products->errors->on('price') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $products->errors->on('price') . "</font>";
                        }
                    }
                    ?>

                    <br>

                    <div class="form-group">
                        <label for="stock">Stock:</label>
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
                               class="form-control"
                               id="stock"
                               name="stock"
                               placeholder="Inserir Stock"
                               maxlength="6"
                               oninput="this.value=this.value.slice(0,this.maxLength)"
                               onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
                            <?php
                            if (isset($products->errors)) { ?>
                               value="<?php
                               print_r($attributes_product['stock']);
                               } ?>">
                    </div>

                    <?php
                    if (isset($products->errors)) {
                        if (is_array($products->errors->on('stock'))) {
                            foreach ($products->errors->on('stock') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $products->errors->on('stock') . "</font>";
                        }
                    }
                    ?>

                    <div class="form-group">
                        <label for="iva_id">Iva:</label>
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
                    " class="form-control" id="iva_id" name="iva_id">
                            <option value="0">Nenhum</option>
                            <?php
                            $iva = Iva::all();
                            foreach ($iva as $ivas) {
                                ?>
                                <?php if ($ivas->vigour == 1) { ?>
                                    <option value="<?= $ivas->id ?>"> <?= $ivas->percentage . "% - " . $ivas->description; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>

                    <?php
                    if (isset($products->errors)) {
                        if (is_array($products->errors->on('iva_id'))) {
                            foreach ($products->errors->on('iva_id') as $error) {
                                echo "<font color='red'>" . $error . "</font>";
                            }
                        } else {
                            echo "<font color='red'>" . $products->errors->on('iva_id') . "</font>";
                        }
                    }
                    ?>

                    <br><br>

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
