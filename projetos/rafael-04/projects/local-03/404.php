<?php
    $pagina = "Erro 404";
    $id     = "5";

    include("common/header.php");
?>

  <div class="banner_w3lspvt-2">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php" class="font-weight-bold">Home</a></li>
      <li class="breadcrumb-item" aria-current="page">404 Error Page</li>
    </ol>
  </div>

  <!-- 404 -->
  <div class="error pb-5 pt-2 text-center" id="price">
    <div class="container pb-xl-5 pb-lg-3">
      <img src="images/error.png" alt="" class="img-fluid" />
      <h3 class="title-w3 text-bl my-3 font-weight-bold text-capitalize">Oops! Encontramos um problema!</h3>
      <p class="sub-tittle text-center4">A página que você procura não foi encontrada. Desculpe-nos!</p>
      <a href="index.php" class="btn button-style mt-5">Voltar o Home</a>
    </div>
  </div>
  <!-- //404 -->
<?php include("common/footer.php"); ?>
