<footer class="bg-dark p-4 text-light" id="footer">
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span>Copyright &COPY; <?= date('Y') ?>, All Right Reserved <?= APP_NAME ?></span>
                </div>
                <div class="col-md-6">
                    <div class="copyright-menu">
                        <ul>
                            <li>
                                <a href="router.php?c=site&a=terms">Termos de Uso</a>
                            </li>
                            <li>
                                <a href="router.php?c=site&a=privacy">Política de Privacidade</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="<?= DIRPAGE ?>public/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>