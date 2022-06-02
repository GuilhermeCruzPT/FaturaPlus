<!DOCTYPE html>
<html>
<head>
    <title>Editar Fatura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRCSS ?>backoffice.css" rel="stylesheet">
</head>
<body>
<section class="home-section">
    <div class="container">
        <div class="box" style="margin: 100px; background: white;">

            <form action="router.php?c=bills&a=update&id=<?= $bill->id ?>" method="post"
                  style="
    width: 1000px;
	padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <h4 class="display-4 text-center">Editar Fatura</h4><hr><br>

                <div class="form-group">
                    <label for="reference">Referência:</label>
                    <input type="number"
                           class="form-control"
                           id="reference"
                           name="reference"
                           maxlength="6"
                           placeholder="Inserir Referência"
                           value="<?= $bill->reference ?>"
                           oninput="this.value=this.value.slice(0,this.maxLength)"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                </div>

                <?php
                if(isset($product->errors)) {
                    if (is_array($bill->errors->on('reference'))) {
                        foreach ($bill->errors->on('reference') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bill->errors->on('reference') . "</font>";;
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="total_value">Valor Total:</label>
                    <input type="text"
                           class="form-control"
                           id="total_value"
                           name="total_value"
                           placeholder="Inserir Valor Total"
                           value="<?= $bill->total_value ?>"
                           maxlength="14"
                           oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                </div>

                <?php
                if(isset($bill->errors)) {
                    if (is_array($bill->errors->on('total_value'))) {
                        foreach ($bill->errors->on('total_value') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bill->errors->on('total_value') . "</font>";;
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="total_iva">Iva Total:</label>
                    <input type="number"
                           class="form-control"
                           id="total_iva"
                           name="total_iva"
                           maxlength="4"
                           placeholder="Inserir Iva Total"
                           value="<?= $bill->total_iva ?>"
                           oninput="this.value=this.value.slice(0,this.maxLength)"
                           onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                </div>

                <?php
                if(isset($bill->errors)) {
                    if (is_array($bill->errors->on('total_iva'))) {
                        foreach ($bill->errors->on('total_iva') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bill->errors->on('total_iva') . "</font>";;
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="state">Estado:</label>
                    <select class="form-control" id="state" name="state">
                        <option value="l" <?= $bill->state == 'l' ? 'selected' : '' ?>>Em Lançamento</option>
                        <option value="e" <?= $bill->state == 'e' ? 'selected' : '' ?>>Emitida</option>
                    </select>
                </div>

                <?php
                if(isset($bill->errors)) {
                    if (is_array($bill->errors->on('state'))) {
                        foreach ($bill->errors->on('state') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bill->errors->on('state') . "</font>";;
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="client_reference_id">Referência Cliente:</label>
                    <select class="form-control" id="client_reference_id" name="client_reference_id">
                        <?php foreach($user as $users){?>
                            <?php if ($users->role == 'c'){ ?>
                                <?php if ($users->id == $bill->client_reference_id){ ?>
                                    <option value="<?= $users->id?>" selected> <?= $users->username; ?></option>
                                <?php  } else { ?>
                                    <option value="<?= $users->id?>"> <?= $users->username; ?></option>
                            <?php  }}} ?>
                    </select>
                </div>

                <?php
                if(isset($bill->errors)) {
                    if (is_array($bill->errors->on('client_reference_id'))) {
                        foreach ($bill->errors->on('client_reference_id') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bill->errors->on('client_reference_id') . "</font>";;
                    }
                }
                ?>

                <br>

                <div class="form-group">
                    <label for="employee_reference_id">Referência Funcionário:</label>
                    <select class="form-control" id="employee_reference_id" name="employee_reference_id">
                        <?php foreach($user as $users){?>
                            <?php if ($users->role == 'f'){ ?>
                                <?php if ($users->id == $bill->employee_reference_id){ ?>
                                    <option value="<?= $users->id?>" selected> <?= $users->username; ?></option>
                                <?php  } else { ?>
                                    <option value="<?= $users->id?>"> <?= $users->username; ?></option>
                                <?php  }}} ?>
                    </select>
                </div>

                <?php
                if(isset($bill->errors)) {
                    if (is_array($bill->errors->on('employee_reference_id'))) {
                        foreach ($bill->errors->on('employee_reference_id') as $error) {
                            echo "<font color='red'>" . $error . "</font>";
                        }
                    } else {
                        echo "<font color='red'>" . $bill->errors->on('employee_reference_id') . "</font>";;
                    }
                }
                ?>

                <br><br>

                <button type="submit"
                        class="btn btn-primary"
                        name="update">Atualizar</button>

                <button type="button"
                        class="btn btn-primary"
                        name="return"
                        onClick="history.go(-1)">Voltar</button>

            </form>
        </div>
    </div>
</section>
</body>
</html>