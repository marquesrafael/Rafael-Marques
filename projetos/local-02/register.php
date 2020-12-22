<?php
  // Include db config
  require_once 'app/config.php';
    $pagina = "Novo registro";

  // Init vars
  $name = $email = $password = $confirm_password = '';
  $name_err = $email_err = $password_err = $confirm_password_err = '';

  // Process form when post submit
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Sanitize POST
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // Put post vars in regular vars
    $name =  trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate email
    if(empty($email)){
      $email_err = 'Por favor, informe um e-mail';
    } else {
      // Prepare a select statement
      $sql = 'SELECT id FROM usuarios WHERE email = :email';

      if($stmt = $pdo->prepare($sql)){
        // Bind variables
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        // Attempt to execute
        if($stmt->execute()){
          // Check if email exists
          if($stmt->rowCount() === 1){
            $email_err = 'Este e-mail já está sendo utilizado. Deseja <a href="login.php">entrar</a>?';
          }
        } else {
          die('Algo deu errado');
        }
      }

      unset($stmt);
    }

    // Validate name
    if(empty($name)){
      $name_err = 'Por favor, informe seu nome';
    }

    // Validate password
    if(empty($password)){
      $password_err = 'Por favor, informe uma senha';
    } elseif(strlen($password) < 6){
      $password_err = 'Sua senha deve ter no mínimo 6 caracteres';
    }

    // Validate Confirm password
    if(empty($confirm_password)){
      $confirm_password_err = 'Por favor, confirme sua senha';
    } else {
      if($password !== $confirm_password){
        $confirm_password_err = 'As senhas não coincidem';
      }
    }

    // Make sure errors are empty
    if(empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
      // Hash password
      $password = password_hash($password, PASSWORD_DEFAULT);

      // Prepare insert query
      $sql = 'INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)';

      if($stmt = $pdo->prepare($sql)){
        // Bind params
        $stmt->bindParam(':nome', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $password, PDO::PARAM_STR);

        // Attempt to execute
        if($stmt->execute()){
          // Redirect to login
          header('location: login.php');
        } else {
          die('Algo deu errado');
        }
      }
      unset($stmt);
    }

    // Close connection
    unset($pdo);
  }
?>
<?php include("app/pages/head.php"); ?>


<body class="bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h2>Criar uma conta</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>" placeholder="Seu nome">
                            <span class="invalid-feedback">
                                <?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="Seu e-mail" >
                            <span class="invalid-feedback">
                                <?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="Sua senha">
                            <span class="invalid-feedback">
                                <?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirme sua senha</label>
                            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" placeholder="Confirme sua senha">
                            <span class="invalid-feedback">
                                <?php echo $confirm_password_err; ?></span>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <input type="submit" value="Resgistrar-se" class="btn btn-success btn-block">
                            </div>
                            <div class="col">
                                <a href="login.php" class="btn btn-light btn-block">Tem uma conta? Entre aqui</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>