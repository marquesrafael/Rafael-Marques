<?php include('common/head.php'); ?>

<?php include('common/navbar.php'); ?>

<!-- body_area_start -->
<body>
    <section class="contact-section">
            <div class="container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3645.5262429015133!2d-46.29937718466643!3d-23.977187384478047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce023c833b02e5%3A0xa7c2ec964d226ef0!2sAv.%20Affonso%20Penna%2C%20760%20-%20Macuco%2C%20Santos%20-%20SP%2C%2011020-004%2C%20Brasil!5e0!3m2!1spt-BR!2sus!4v1599308494012!5m2!1spt-BR!2sus" width="1100" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <h2 class="contact-title"></h2>
                        </div>  
                 
                </div>

                    <div class="col-lg-8">
                        Atenção: Formulario desativado!
                        <br />
                        <form class="form-contact contact_form" id="contactForm" novalidate="novalidate">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Sua mensagem...'" placeholder="Sua mensagem"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Seu nome'" placeholder="Seu nome">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Seu email'" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Assunto'" placeholder="Assunto">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn btn btn-success">Enviar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-home"></i></span>
                            <div class="media-body">
                                <h3>Av. Afonso Pena, 760 </h3>
                                <p>Santos/SP</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-phone"></i></span>
                            <div class="media-body">
                                <h3>(13) 3227-5322</h3>
                                <p>Segunda à Sábado <br>09:00 às 12:00hs <br>14:00 às 18:00hs</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-envelope"></i></span>
                            <div class="media-body">
                                <h3>dogland@terra.com.br</h3>
                                <p>A qualquer momento</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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