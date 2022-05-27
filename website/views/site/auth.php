<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIRPAGE ?>public/css/auth.css" rel="stylesheet">
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form method="post" action="router.php?c=auth&a=signup">
            <h1>Criar uma Conta</h1>
            <div class="sign-up-field-container">
                <p>Ao registar-se, você confirma que concorda com os Termos e Condições e a
                    Política de Privacidade da Fatura+ </p>
                <!--<input type="text" placeholder="Username" />
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />-->
            </div>
            <button class="button-auth" role="button"><span>Registar</span></button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="router.php?c=auth&a=verify_login" method="POST">
            <h1>Entrar</h1>
            <div class="sign-in-field-container">
                <input name="username" type="text" placeholder="Username" />
                <input name="password" type="password" placeholder="Password" />
            </div>
            <a href="#">Esqueceu-se da palavra-passe?</a>
            <button type="submit" class="button-auth" role="button"><span>Entrar</span></button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Bem-vindo<br>de volta!</h1>
                <p>Para manter-se conectado connosco, entre com os seus dados pessoais</p>
                <button class="ghost btn-reflex" id="signIn">Entrar</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Olá, Amigo!</h1>
                <p>Insere os teus dados pessoais e começa a jornada connosco</p>
                <button class="ghost btn-reflex" id="signUp">Registar</button>
            </div>
        </div>
    </div>
</div>


<script src="<?= DIRPAGE ?>public/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>