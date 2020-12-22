<?php include('common/head.php'); ?>

<?php include('common/navbar.php'); ?>

<!-- body_area_start -->
<body>

    <!-- adapt_area_start  -->
    <div class="adapt_area">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5">
                    <div class="adapt_help">
                        <div class="section_title">
                            <h1>Nossas Instalações</h1>
                            <p>Possuímos  em uma área de 1.200 mts², 15 quartos com 10 m² com área coberta e de solarium e 7 quartos com 07 mts² totalmente cobertos, sendo todos os 22 quartos azulejados e com piso anti derrapante. Uma sala de banho para mantermos sempre o seu amigo limpinho</p>

							<p>Em  nosso espaço externo temos 04 áreas com 700 mts² de recreação, gramada com  palmeiras, coqueiros e bebedouros automáticos, permitindo que os cães tenham sombra e água fresca durante suas brincadeiras.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="adapt_about">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="single_adapt text-center">
                                    <img src="assets/img/icons/2.png" alt="">
                                    <div class="adapt_content">
                                        <br />
                                        <p><a href="contato.php">Nossa localização</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_adapt text-center">
                                    <img src="assets/img/icons/1.png" alt="">
                                    <div class="adapt_content">
                                        <br />
                                        <p><a href="area.php">Àrea de lazer</a></p>
                                    </div>
                                </div>
                                <div class="single_adapt text-center">
                                    <img src="assets/img/icons/3.png" alt="">
                                    <div class="adapt_content">
                                        <br />
                                        <p><a href="">Nosso espaço</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- adapt_area_end  -->

</body>
<!-- body_area_end -->

<?php include('common/footer.php'); ?>

<!-- script_area_start -->
<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="assets/js/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript">
jQuery('#grid-container').cubeportfolio({
    filters: '#filters-container',
});
</script>
<!-- script_area_end-->

</html>