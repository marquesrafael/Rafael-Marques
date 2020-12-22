<?php
session_start();
set_time_limit(0);
$pagina_login = 1;
include 'config.php';
include 'functions.php';
if (isset($_GET['sair'])) {
$_SESSION['logado'] = "";
}
?>
<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title>Livro caixa</title>
        <meta name="robots" content="index,follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#147500">
        <meta name="description" content="Um site simples, minimamente desenvolvido, apenas para controle financeiro simplificado">
        <meta name="author" content="Rafael Marques, contato@rafaelmarques.net">
        <meta name="revised" content="Sunday, July 12, 2020, 8:07 AM" />
        <meta name="copyright" content="Rafael Marques">
        <meta name="Classification" content="personal">
        <meta name="language" content="Portuguese" />
        <meta name="audience" content="all" />
        <meta name="rating" content="general" />
        <link rel="icon" href="assets/img/web/favicon.png" />
        <link rel="stylesheet" href="assets/css/reset.css?v=2.0-modified">
        <link rel="stylesheet" href="assets/css/bootstrap.css?v=v4.5.0">
        <link rel="stylesheet" href="assets/css/styles.css?v=1.5">
        <link rel="stylesheet" href="assets/css/jquery-ui.css?v=1.5">
        <link rel="stylesheet" href="assets/fonts/boxicons/boxicons.css?v=1.5">
        <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    </head>

</head>
<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">
                <div class="text-center">
                    <img src="assets/img/happiness.svg" alt="..." class="img-fluid">
                </div>
            </div>
            <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">
                
                <h1 class="display-4 text-center mb-3">
                Sign in
                </h1>
                
                <p class="text-muted text-center mb-5">
                    Acessar seu painel
                </p>
                
                <form action="" method="post">
                    <div class="form-group">
                        <label>Usuário</label>
                        <input type="text" class="form-control" placeholder="Seu usuário" name='login'>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                
                                <label>Senha</label>
                            </div>
                            
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" class="form-control form-control-appended" placeholder="Sua senha" name='senha'>
                        </div>
                    </div>
                    <!-- Submit -->
                    <button class="btn btn-lg btn-block btn-primary mb-3">
                    Entrar
                    </button>
                    
                </form>
                
                <script src="assets/js/jquery-3.5.1.min.js"></script>
                <script src="assets/js/bootstrap.js"></script>
                <script src="assets/js/typed.js"></script>
                <script src="assets/js/scripts.js"></script>
                <script src="assets/js/jquery-ui.js"></script>
                <script src="assets/js/jquery.mask.min.js"></script>
                <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            </body>
        </html>
    </div>
    </div> <!-- / .row -->
    </div> <!-- / .container -->