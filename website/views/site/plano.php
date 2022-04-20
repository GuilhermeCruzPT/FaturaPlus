
<?php require_once './views/layout/header.php'; ?>

<form method="post" action="<?= APP_BASE_URL ?>?c=site&a=processa">
    <input type="text" name="nome">
    <input type="submit" value="confirmar">
</form>

<?php require_once './views/layout/footer.php'; ?>
