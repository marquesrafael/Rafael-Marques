<?php 
    $pagina = "empresa" ;
    $titulo = "Sobre a empresa";
    include "app/config.php";
    include "pages/head.php";
    include "pages/header.php";

    $qsistema = $pdo->query("SELECT * FROM sistema");
    $sistema = $qsistema->fetchAll(PDO::FETCH_ASSOC);
    foreach($sistema as $itemsistema){
?>

<body>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center mb-4">A <?php echo $itemsistema['website']; ?></h1>
                    <div class="row">
                        <div class="col-lg-5 col-md-6 p-md-4 col-2"> <img class="img-fluid d-block" src="files/img/unitralog.jpg" width="1500"> </div>
                        <div class="col-md-6 offset-lg-1 d-flex flex-column justify-content-center py-4">
                            <p class="lead">Estamos empenhados em oferecer o que há de melhor em termos de venda e aluguel de containers de qualquer tipo. Nossa prioridade sempre será nossos clientes.
                            Com uma equipe especializada em entender o que nosso cliente precisa, para oferecer o que á de melhor.
                            <br />
                    </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php } include "pages/footer.php"; ?>
