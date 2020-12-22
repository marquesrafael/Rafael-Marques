<?php
session_start();
set_time_limit(0);
$pagina_login = 1;
include 'config.php';
include 'functions.php';
if (isset($_GET['sair'])) {
$_SESSION['logado'] = "";
setcookie('usuario');
}
if (isset($_POST['acao']) && $_POST['acao'] == 1) {
$usuario = $_POST['login'];
$senha = md5($_POST['senha']);
$query = $conn->query("SELECT * FROM lc_usuario WHERE usuario LIKE '$usuario' OR email LIKE '$usuario'");
$query_assoc = $query->fetchAll(PDO::FETCH_ASSOC);
$total       = $query->rowCount();

if ($total > 0) {
    foreach ($query_assoc as $row) {
    $senha2 = $row['senha'];
    }

    if ($senha2 != $senha) {
    $erro = "Senha não confere!";
    } 

    if ($senha2 == $senha) {
        setcookie('usuario', $usuario);
        header("Location: ./");
        exit();
    }
} else {
    $erro = "Usuário não localizado";
}
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
        <link rel="stylesheet" href="assets/css/login.css">
        <link rel="stylesheet" href="assets/fonts/boxicons/boxicons.css?v=1.5">
        <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    </head>
</head>
<body>
    <main class="container-fluid w-100" role="main">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center bg-white mnh-100vh">
                <a class="u-login-form py-3 mb-auto" href="/">
                    
                </a>
                <div class="u-login-form">
                    <form class="mb-3" action="" method="post">
                        <input type="hidden" name="acao" value="1" />
                        <div class="mb-3">
                            <h1 class="h2">Bem vindo de volta</h1>
                            <p class="small">Utilize suas credenciais para entrar no dashboard!</p>
                        </div>
                        <?php
                        if (isset($erro)) {
                        ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <i class="fas fa-peace mr-2"></i> <?php echo $erro; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="form-group mb-4">
                            <label for="user">Seu usuário</label>
                            <input id="user" class="form-control" name="login" type="text" placeholder="Seu usuário">
                        </div>
                        <div class="form-group mb-4">
                            <label for="senh">Senha</label>
                            <input id="senh" class="form-control" name="senha" type="password" placeholder="Sua senha">
                        </div>
                        <button class="btn btn-primary btn-block" type="submit"value="entrar">Login</button>
                    </form>
                </div>
                <div class="u-login-form text-muted py-3 mt-auto">
                    <small><i class="far fa-question-circle mr-1"></i> Se você não tem uma credencial, por favor, entre em <a href="mailto:contato@rafaelmarques.net">contato</a>.</small>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-flex flex-column align-items-center justify-content-center bg-light">
                <figure class="u-shape u-shape--top-right u-shape--position-5">
                    <img src="./assets/svg/shapes/shape-1.svg" alt="Image description">
                </figure>
                <figure class="u-shape u-shape--center-left u-shape--position-6">
                    <img src="./assets/svg/shapes/shape-2.svg" alt="Image description">
                </figure>
                <figure class="u-shape u-shape--center-right u-shape--position-7">
                    <img src="./assets/svg/shapes/shape-3.svg" alt="Image description">
                </figure>
                <figure class="u-shape u-shape--bottom-left u-shape--position-8">
                    <img src="./assets/svg/shapes/shape-4.svg" alt="Image description">
                </figure>
            </div>
        </div>
    </main>
</body>
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