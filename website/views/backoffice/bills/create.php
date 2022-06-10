<!DOCTYPE html>
<html>
<head>
    <title>Criar Fatura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=bills&a=save" method="post" style="
            width: 1000px;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Criar Fatura</h4><hr><br>
                <div class="form-group">
                    <label for="client_reference_id">Referência Cliente:</label>
                    <datalist id="client_reference_id">
                        <?php foreach($users as $user){?>
                        <?php if ($user->role == 'c'){ ?>
                        <option value="<?= $user->username ?>">
                            <?php  }} ?>
                    </datalist>
                    <input placeholder="Nenhum" class="form-control" autoComplete="on" list="client_reference_id"/>
                </div>

                <?php
                if(isset($bills->errors)) {
                    if (is_array($bills->errors->on('client_reference_id'))) {
                        foreach ($bills->errors->on('client_reference_id') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bills->errors->on('client_reference_id') . "</font>";
                    }
                }
                ?>

                <br>

                <a href=""
                   class=" btn btn-primary"
                   role="button"
                   aria-pressed="true">Adicionar</a>

                <a href=""
                   class=" btn btn-success"
                   role="button"
                   aria-pressed="true">Criar</a>

                <br><br>

                <div class="form-group">
                    <label for="product_id">Referência Produto:</label>
                    <datalist id="product_id">
                        <?php foreach($products as $product){?>
                        <?php if ($product->stock != 0){ ?>
                        <option value="P<?= $product->reference . ' - ' . $product->title ?>">
                            <?php  }} ?>
                    </datalist>
                    <input placeholder="Nenhum" class="form-control" autoComplete="on" list="product_id"/>
                </div>

                <?php
                if(isset($bills->errors)) {
                    if (is_array($bills->errors->on('employee_reference_id'))) {
                        foreach ($bills->errors->on('employee_reference_id') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bills->errors->on('employee_reference_id') . "</font>";
                    }
                }
                ?>

                <br>

                <a href=""
                   class=" btn btn-primary"
                   role="button"
                   aria-pressed="true">Adicionar</a>

                <a href=""
                   class=" btn btn-success"
                   role="button"
                   aria-pressed="true">Criar</a>

                <br><br><br>


























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

                <button type="submit"
                        class="btn btn-primary"
                        name="create">Criar</button>

                <a href="router.php?c=bills&a=index"
                   class=" btn btn-primary btn-back"
                   role="button"
                   aria-pressed="true">Voltar</a>

            </form>
        </div>
    </div>
</section>
</body>
</html>