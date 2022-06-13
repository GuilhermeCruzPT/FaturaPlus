<!DOCTYPE html>
<html>
<head>
    <title>Criar Fatura</title>
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<section class="home-section" >
    <div class="container">
        <div class="box" style="margin: 100px; background: white;
            width: 1000px;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Criar Fatura</h4><hr><br>
                <label for="client_reference_id">Referência Cliente:</label>
                <form method="post" action="router.php?c=bills&a=create">

                    <select style="width: 50%" id="client_id" name="client_id" >
                        <?php if(isset($client_i)){?>
                            <option value="<?= $client_i ?>"><?php foreach($users as $user){ if ($client_i == $user->id){ echo $user->username;}}?></option>
                        <?php }else{ ?>
                        <option value="0">Nenhum</option>
                        <?php foreach($users as $user){?>
                            <?php if ($user->role == 'c'){  ?>
                                <option value="<?= $user->id ?>"><?= $user->username;?></option>
                            <?php  }}} ?>
                    </select>

                        <button
                           name="btn_adicionar_client"
                           class=" btn btn-primary"
                           role="button"
                           aria-pressed="true"
                        >Adicionar</button>


                        <a data-toggle="modal" data-target="#Modalclient"
                           class="btn_adicionar_cliente btn btn-success"
                           role="button" name="btn_adicionar_cliente" id="btn_adicionar_cliente"
                           aria-pressed="true" >Criar</a>

                        <button
                           name="btn_apagar_client"
                           class=" btn btn-danger"
                           role="button"
                           aria-pressed="true">Cancel</button>

                <br><br>

            <label for="product_id">Referência Produto:</label>
            <br>
            <select style="width: 50%" id="product_id" name="product_id" >
                <?php foreach($products as $product){?>
                <?php if ($product->stock != 0){ ?>

                <option name="product_id" value="<?= $product->id?>"> <?= $product->reference  . " - " . $product->title;?></option>
                    <?php  }} ?>
            </select>

            <button
               name="btn_adicionar"
               class=" btn btn-primary"
               role="button"
               aria-pressed="true">Adicionar</button>
                <input type="hidden" name="products_array" value="<?php echo htmlentities(serialize($products_array));  ?>"/>
            <a data-toggle="modal" data-target="#Modalproduct"
               class="btn_adicionar_produto btn btn-success"
               role="button" name="btn_adicionar_produto" id="btn_adicionar_produto"
               aria-pressed="true" >Criar</a>

            <br><br>
                    <br><br>
            <table class="table table-striped" style="background: white">
                <thead>
                <tr>

                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor Unitário</th>
                    <th scope="col">Valor do Iva</th>
                    <th scope="col">Referência Produto</th>
                    <th scope="col">Referência Fatura</th>
                    <th scope="col">Ações Disponiveis</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (empty($products_array)){
                    echo "<td><td><td><td>"."Ainda não foram inseridos dados"."</td></td></td></td>"."<td><td><td><td></td></td></td></td>";
                }else{
                foreach ($products_array as $products_a) { ?>


                <td><?= $products_a['id'],$products_a['quantity']?></td>
                <td><?= $products_a['unitary_value']?></td>
                <td><?php
                    foreach ($ivas as $iva) {
                        if ($products_a['iva_value'] == $iva->id) {
                            echo $iva->percentage." - ".$iva->description;
                        }
                    }
                     ?></td>
                <td><?php
                    foreach($products as $product){

                        if ($products_a['product_id'] == $product->id){
                            echo $product->title.$product->id;
                        }
                    }
                    ?></td>
                <td><?= $products_a['bill_id']?></td>

                <td>

                    <a <?php //var_dump($products_a['quantity']); ?>
                            class="btn btn-primary btn-icon-show btn-icon"><i class='bx bx-show-alt bx-tada action-icon'></i></a>
                    <button value ="<?= $products_a['id'] ?>"  name="btn_apagar" class="btn-del-lines btn btn-danger btn-icon-delete btn-icon"><i class='bx bx-trash bx-tada action-icon'></i></button>


                </td>
                </tr>
                </tbody>
                <?php } }?> </table>

            <?php
            if (empty($products_array)){
                $total = 0;
                $iva_total = 0;
            }else {
                $total = 0;
                $iva_total = 0;
                foreach ($products_array as $products_total) {
                    $total += $products_total['unitary_value'];
                    $ivas = Iva::all();
                    foreach ($ivas as $iva) {
                        if ($iva->id == $products_total['iva_value']) {
                            $iva_total += $iva->percentage;
                        }
                    }
                }

            }
            echo "Total: ".$total."€";
            ?>

                <input type="hidden" name="total" value="<?= $total ?>"/>
                    <input type="hidden" name="iva_total" value="<?= $iva_total ?>"/>

                    <div style="float: right;">
                    <button type="submit"
                            class="btn btn-primary"
                            name="emitir_fatura">Emitir Fatura</button>
                        <button type="submit"
                                class="btn btn-primary"
                                name="guardar_fatura">Guardar rascunho</button>

                    <a href="router.php?c=bills&a=index"
                       class=" btn btn-danger btn-back"
                       role="button"
                       aria-pressed="true">Voltar</a>
        </div>
                </form>












                <!--<div class="form-group">
                    <label for="reference">Referência:</label>
                    <input type="number"
                           class="form-control"
                           id="reference"
                           name="reference"
                           maxlength="6"
                           placeholder="Inserir Referência"
                           oninput="this.value=this.value.slice(0,this.maxLength)"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
                        <?php
/*                        if(isset($user->errors)) {*/?>
                           value="<?php
/*                           print_r($attributes['reference']);} */?>">
                </div>

                <?php
/*                if(isset($bills->errors)) {
                    if (is_array($bills->errors->on('reference'))) {
                        foreach ($bills->errors->on('reference') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bills->errors->on('reference') . "</font>";
                    }
                }
                */?>

                <br>-->









                <!--<div class="form-group">
                    <label for="total_value">Valor Total:</label>
                    <input type="text"
                           class="form-control"
                           id="total_value"
                           name="total_value"
                           placeholder="Inserir Valor Total"
                           maxlength="14"
                           oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                </div>

                <?php
/*                if(isset($bills->errors)) {
                    if (is_array($bills->errors->on('total_value'))) {
                        foreach ($bills->errors->on('total_value') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bills->errors->on('total_value') . "</font>";
                    }
                }
                */?>

                <br>

                <div class="form-group">
                    <label for="total_iva">Iva Total:</label>
                    <input type="number"
                           class="form-control"
                           id="total_iva"
                           name="total_iva"
                           maxlength="4"
                           placeholder="Inserir Iva Total"
                           oninput="this.value=this.value.slice(0,this.maxLength)"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                </div>

                <?php
/*                if(isset($bills->errors)) {
                    if (is_array($bills->errors->on('total_iva'))) {
                        foreach ($bills->errors->on('total_iva') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bills->errors->on('total_iva') . "</font>";
                    }
                }
                */?>

                <br>-->










                <!--<div class="form-group">
                    <label for="state">Estado:</label>
                    <select class="form-control" id="state" name="state">
                        <option value="">Nenhum</option>
                        <option value="l">Em Lançamento</option>
                    </select>
                </div>

                <?php
/*                if(isset($bills->errors)) {
                    if (is_array($bills->errors->on('state'))) {
                        foreach ($bills->errors->on('state') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bills->errors->on('state') . "</font>";
                    }
                }
                */?>

                <br>

                <div class="form-group">
                    <label for="client_reference_id">Referência Cliente:</label>
                    <select class="form-control" id="client_reference_id" name="client_reference_id">
                        <option value="0">Nenhum</option>
                        <?php /*foreach($users as $user){*/?>
                            <?php /*if ($user->role == 'c'){ */?>
                                <option value="<?/*= $user->id*/?>"> <?/*= $user->username; */?></option>
                            <?php /* }} */?>
                    </select>
                </div>

                <?php
/*                if(isset($bills->errors)) {
                    if (is_array($bills->errors->on('client_reference_id'))) {
                        foreach ($bills->errors->on('client_reference_id') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bills->errors->on('client_reference_id') . "</font>";
                    }
                }
                */?>

                <br>

                <div class="form-group">
                    <label for="employee_reference_id">Referência Funcionário:</label>
                    <select class="form-control" id="employee_reference_id" name="employee_reference_id">
                        <option value="0">Nenhum</option>
                        <?php /*foreach($users as $user){*/?>
                            <?php /*if ($user->role == 'f'){ */?>
                                <option value="<?/*= $user->id*/?>"> <?/*= $user->username; */?></option>
                            <?php /* }} */?>
                    </select>
                </div>

                --><?php
/*                if(isset($bills->errors)) {
                    if (is_array($bills->errors->on('employee_reference_id'))) {
                        foreach ($bills->errors->on('employee_reference_id') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bills->errors->on('employee_reference_id') . "</font>";
                    }
                }
                */?>

                <br><br>

        </div>
    </div>
</section>
</body>
</html>

<?php include('popup_client.php');?>
<?php include('popup_product.php');?>
<script type="text/javascript">

    $(document).ready(function(){

        $(document).on('click', '.btn_adicionar_cliente', function(){

            $('#Modalclient').modal('show');//load modal

        });

        $(document).on('click', '.btn_adicionar_produto', function(){

            $('#Modalproduct').modal('show');//load modal

        });

    });
</script>

<?php

    if (!empty($attributes_client)) {

        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>';
        echo '<script>$("#Modalclient").modal("show")</script>';

    }
    if (!empty($attributes_product)) {

        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>';
        echo '<script>$("#Modalproduct").modal("show")</script>';
        var_dump($attributes_product);
    }
?>







