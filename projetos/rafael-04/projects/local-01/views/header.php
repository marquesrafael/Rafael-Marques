<div class="header-top"></div>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/"><?php echo $site ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php echo ( $page == "home" ? "active" : "" );?>">
                    <a class="nav-link" href="/">Home <?php echo ( $page == "home" ? "<span class=\"sr-only\">(current)</span>" : "" );?></a>
                </li>
                <li class="nav-item <?php echo ( $page == "tipos" ? "active" : "" );?>">
                    <a class="nav-link" href="tipos.php">Tipos de Contêineres <?php echo ( $page == "tipos" ? "<span class=\"sr-only\">(current)</span>" : "" );?></a>
                </li>
                <li class="nav-item <?php echo ( $page == "empresa" ? "active" : "" );?>">
                    <a class="nav-link" href="empresa.php">A empresa <?php echo ( $page == "empresa" ? "<span class=\"sr-only\">(current)</span>" : "" );?></a>
                </li>
                <li class="nav-item <?php echo ( $page == "contato" ? "active" : "" );?>">
                    <a class="nav-link" href="contato.php">Contato <?php echo ( $page == "contato" ? "<span class=\"sr-only\">(current)</span>" : "" );?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>