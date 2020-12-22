<?php 
    $qsistema = $pdo->query("SELECT * FROM sistema");
    $sistema = $qsistema->fetchAll(PDO::FETCH_ASSOC);
    foreach($sistema as $itemsistema){
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="">
    <div class="container justify-content-center">
        <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar9">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center justify-content-center" id="navbar9">
            <ul class="navbar-nav">
                <li class="nav-item mx-2"> <a class="nav-link <?php echo ( $pagina == "home" ? "active" : "" );?>" href="index.php">Home</a> </li>
                <li class="nav-item mx-2"> <a class="nav-link <?php echo ( $pagina == "empresa" ? "active" : "" );?>" href="empresa.php">A empresa</a> </li>
                <li class="nav-item mx-2"> <a class="nav-link navbar-brand mr-0 text-white" href="index.php"><i class="fa d-inline fa-lg fa-stop-circle-o"></i>
                        <b><?php echo $itemsistema['website']; ?></b></a> </li>
                <li class="nav-item mx-2"> <a class="nav-link <?php echo ( $pagina == "tipos" ? "active" : "" );?>" href="tipos.php">Tipos de container</a> </li>
                <li class="nav-item mx-2"> <a class="nav-link <?php echo ( $pagina == "contato" ? "active" : "" );?>" href="contato.php">Contato</a> </li>
            </ul>
        </div>
    </div>
</nav>
<?php } ?>
