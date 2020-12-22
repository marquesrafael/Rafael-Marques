<?php
    require_once 'app/config.php';
    
    $pagina = "Entrar no sistema";
    $email = $password = '';
    $email_err = $password_err = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if(empty($email)){
            $email_err = 'Por favor, informe o seu e-mail';
        }

        if(empty($password)){
            $password_err = 'Por favor, informe a sua senha';
        }

        if(empty($email_err) && empty($password_err)){
            $sql = 'SELECT * FROM usuarios WHERE email = :email';

            if($stmt = $pdo->prepare($sql)){
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                if($stmt->execute()){
                    if($stmt->rowCount() === 1){
                        if($row = $stmt->fetch()){
                            $hashed_password = $row['senha'];
                            if(password_verify($password, $hashed_password)){
                                session_start();
                                $_SESSION['email'] = $email;
                                $_SESSION['id'] = $row['id'];
                                header('location: index.php');
                            } else {
                                $password_err = 'Desculpe, a senha informada está incorreta';
                            }
                        }
                    } else {
                        $email_err = 'Não encontramos este e-mail. Deseja <a href="register.php">cadastrar</a>?';
                    }
                } else {
                    die('Algo deu errado');
                }
            }
            unset($stmt);
        }
        unset($pdo);
    } 

    include("app/pages/head.php"); 
?>

<body class="bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h2>Entrar no sistema</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <label for="email">Seu e-mail</label>
                            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="Seu e-mail...">
                            <span class="invalid-feedback">
                                <?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Sua senha</label>
                            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="Sua senha...">
                            <span class="invalid-feedback">
                                <?php echo $password_err; ?></span>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="submit" value="Login" class="btn btn-success btn-block">
                            </div>
                            <div class="col">
                                <a href="register.php" class="btn btn-light btn-block">Não tem conta? Cadastre-se</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
