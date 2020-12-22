<?php

//Configura??o do Banco de dados
$host = "localhost";
$user = "root";
$pass = "usbw";
$d_b = "livro_caixa";

//T?tulo do seu livro Caixa, geralmente seu nome
$lc_titulo="CAIXEX";

//Autentica??o simples
$usuario="rafael";
$senha="110494r";

//////////////////////////////////////
//N?o altere a partir daqui!
//////////////////////////////////////

//$conn = mysql_connect($host, $user, $pass) or die("Erro na conexгo com a base de dados");
//$db = mysql_select_db($d_b, $conn) or die("Erro na seleзгo da base de dados");

try {
  $conn = new PDO('mysql:host=localhost;dbname=livro_caixa', $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

if (isset($_SESSION['logado']))
    $logado = $_SESSION['logado'];
else
    $logado = "";

$senha_ = md5($senha);

if (isset($_POST['login']) && $_POST['login'] != '') {

    if ($_POST['login'] == $usuario && $_POST['senha'] == $senha) {
        $logado = $_SESSION['logado'] = md5($_POST['senha']);
        header("Location: ./");
        exit();
    }
}

if ($logado != $senha_ && !isset($pagina_login)) {

    header("Location: login.php");

    exit();
}
?>