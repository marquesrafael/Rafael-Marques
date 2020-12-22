<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <script data-ad-client="ca-pub-1481368280954988" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <meta charset="UTF-8" />
  <meta name="robots" content="index,follow" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Local containers - <?php echo $pagina ?></title>
  <link rel="icon" href="assets/images/favicon.ico" />

  <meta name="author" content="Rafael Marques, contato@rafaelmarques.net">
  <meta name="revised" content="Wednesday, February 12, 2020, 10:30 AM" />
  <meta name="Classification" content="Business">
  <meta name="copyright" content="Local containers">
  <meta name="url" content="https://localcontainers.rafaelmarques.net">
  <meta name="theme-color" content="#db5945">

  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/all.css">
  <?php if( $id == "3" ) { ?>
  <link rel="stylesheet" href="assets/css/card.css">
  <link rel="stylesheet" href="assets/css/google-icons.css">
  <link rel="stylesheet" href="assets/css/tab.css">
  <link rel="stylesheet" href="assets/css/icon.css">
  <?php }	else {echo "";}?>
</head>

<body>
  <div class="main-top" id="home">
    <!-- header -->
    <header>
      <div class="container-fluid">
        <div class="header d-lg-flex justify-content-between align-items-center py-3 px-sm-3">

          <!-- logo -->
          <div id="logo">
            <h1><a href="index.php"><span class="font-1">Local</span> <span class="font-2">containers</span></a></h1>
          </div>
          <!-- //logo -->

          <!-- nav -->
          <div class="nav_w3ls">
            <nav>
              <label for="drop" class="toggle">Menu</label>
              <input type="checkbox" id="drop" />
              <ul class="menu">
                <li><a href="index.php" <?php echo ( $id == "1" ? "class='active'" : "" ); ?>>Home</a></li>
                <li><a href="about.php" <?php echo ( $id == "2" ? "class='active'" : "" ); ?>>Sobre a Empresa</a></li>
                <li><a href="containers.php" <?php echo ( $id == "3" ? "class='active'" : "" ); ?>>Tipos de containers</a></li>
                <li><a href="contact.php" <?php echo ( $id == "4" ? "class='active'" : "" ); ?>>Contato</a></li>
              </ul>
            </nav>
          </div>
          <!-- //nav -->
        </div>
      </div>
    </header>
    <!-- //header -->

      <div class="container py-lg-3">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <a href="covid.php"><strong>Alerta sobre o Coronavírus (COVID-19)</strong> Temos um comunicado para você! </a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  </div>
