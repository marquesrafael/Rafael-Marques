<?php 
    $pagina = "home" ;
    $titulo = "Pagina inicial";
    include "app/config.php";
    include "pages/head.php";
    include "pages/header.php";

    $qsistema = $pdo->query("SELECT * FROM sistema");
    $sistema = $qsistema->fetchAll(PDO::FETCH_ASSOC);
    foreach($sistema as $itemsistema){
?>

<body>
    <div class="py-5" style="	background-image: url(files/img/home-slider-2.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat;">
        <div class="container">
            <div class="row">
                <div class="p-5 bg-white ml-auto col-md-12 border border-radius">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="display-4">Containers?</h1>
                            <p class="">Se você precisa comprar containers REEFER ou container DRY, conte com a <?php echo $itemsistema['website']; ?>. Preços imbatíveis e muita qualidade.</p>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-success btn-lg btn-block" href="contato.php">Entrar em contato</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><br /></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-info btn-lg btn-block" href="tipos.php">Conheça os tipos de container</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
        </div>
    </div>

    <div class="py-3 text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 p-4"> <i class="d-block far fa-6x mb-2 text-success fa-calendar-check"></i>
                    <p>Compromisso com nossos clientes, para se sentirem totalmente satisfeitos!</p>
                </div>
                <div class="col-lg-5 col-md-6 p-4"> <i class="d-block far fa-6x mb-2 text-info fa-comments"></i>
                    <p>Atendimento 24/7/365 para o que nossos clientes precisarem.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3 text-center">
        <div class="container">
            <div class="row justify-content-center">
                <a class="btn btn-success btn-lg btn-block" href="projetos.php">Veja nossa galeria de projetos</a></div>
        </div>
    </div>
    </div>



</body>

<?php } include "pages/footer.php"; ?>