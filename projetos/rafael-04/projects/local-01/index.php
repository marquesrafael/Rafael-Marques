<?php 
    $titulo = "Wagner S/A";
    $descricao = "Página principal";
    $page = "home"; //home or tipos or empresa or contato
    
    include 'views/head.php';
    
    include 'views/header.php';
?>

<main>
    <header class="masthead"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 py-5" style="background: #000; opacity: 0.6; border-radius: 5px;">
                    <h1 class="mb-4">Procurando Contêineres?</h1>
                    <h2 class="m-0">Para usar como deposito geral, usar em canteiro de obras, fazer modificações tipo escritório/casa/stand de venda/banheiro coletivo e etc? Precisa de container / contêineres tipo câmara frigorifica? E outros ?</h2>
                </div>
                <div class="col-lg-5">
                    <div class="py-5 px-4 masthead-cards">
                        <div class="d-flex">
                            <a href="tipos.php" class="w-50 pr-3 pb-4">
                                <div class="card border-0 border-bottom-red shadow-lg shadow-hover">
                                    <div class="card-body text-center">
                                        <div class="text-center">
                                            <i class="fas fa-4x fa-plus-circle my-2"></i>
                                        </div>
                                        Tipos de Contêineres
                                    </div>
                                </div>
                            </a>
                            <a href="contato.php" class="w-50 pl-3 pb-4">
                                <div class="card border-0 border-bottom-blue shadow-lg shadow-hover">
                                    <div class="card-body text-center">
                                        <div class="text-center">
                                            <i class="fas fa-4x fa-envelope-open-text my-2"></i>
                                        </div>
                                        Entrar em Contato
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="shape"></div>
                    </div>
                </div>
            </div>
        </div>
        <svg style="pointer-events: none" class="wave" width="100%" height="50px" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 75">
            <defs>
                <style>
                    .a {
                        fill: none;
                    }

                    .b {
                        clip-path: url(#a);
                    }

                    .c,
                    .d {
                        fill: #f9f9fc;
                    }

                    .d {
                        opacity: 0.5;
                        isolation: isolate;
                    }

                </style>
                <clipPath id="a">
                    <rect class="a" width="1920" height="75" />
                </clipPath>
            </defs>
            <title>wave</title>
            <g class="b">
                <path class="c" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48" />
            </g>
            <g class="b">
                <path class="d" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10" />
            </g>
            <g class="b">
                <path class="d" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24" />
            </g>
            <g class="b">
                <path class="d" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150" />
            </g>
        </svg>
    </header>
</main>

<body>
    <br />
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5">
                <center><i class="fas fa-6x fa-comments" style="color: #1E90FF;"></i><br />
                    <h2>Atendimento 24h</h2>
                </center>
                <p>Uma equipe especializada, a sua disposição 7 dias por semana. Para qualquer duvida, compras ou o que você precisar.</p>
            </div>

            <div class="col-md-6 mb-5">
                <center><i class="fas fa-6x fa-calendar-check" style="color: #1E90FF;"></i><br />
                    <h2>Compromisso</h2>
                </center>
                <p>Nossos clientes são nossa maior preocupação, por isso, nos esforçamos para satisfaze-los.</p>
            </div>
        </div>
    </div>

    <section id="parallaxBar" data-speed="6" data-type="background" style="background-position: 50% -400px;">
        <div class="container">
            <div class="container" id="containerMiddle">
                <div class="row" id="rowContainerMiddle">
                    <div class="col-md-6">
                        <h1 id="h1Topo"></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="after-loop">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <a href="" class="after-loop-item card border-0 card-templates shadow-lg">
                        <div class="card-body d-flex align-items-end flex-column text-right">
                            <h4>Ver galeria de imagens</h4>
                            <i class="fas fa-images"></i>
                        </div>
                    </a>
                </div>
<br />
                <div class="col-lg-6 ">
                    <a href="" class="after-loop-item card border-0 card-guides shadow-lg">
                        <div class="card-body d-flex align-items-end flex-column text-right">
                            <h4>Ver nossos projetos</h4>
                            <i class="fas fa-images"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>


<?php   include 'views/footer.php'; ?>