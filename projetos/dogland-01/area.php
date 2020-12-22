<?php include('common/head.php'); ?>

<?php include('common/navbar.php'); ?>

<!-- body_area_start -->
<body>
<div class="container">
<div id="filters-container">
    <div data-filter="*" class="cbp-filter-item cbp-filter-item-active">All</div>
    <div data-filter=".animation" class="cbp-filter-item">Espaço</div>
    <div data-filter=".artwork" class="cbp-filter-item">Aréa</div>
</div>

    <div id="grid-container">
        <div class="cbp-item animation ">
            <a data-fancybox="gallery" href="https://htmlstream.com/preview/front-v3.2.2/documentation/assets/img/img21.jpg"><img src="https://htmlstream.com/preview/front-v3.2.2/documentation/assets/img/img21.jpg"></a>
        </div>

        <div class="cbp-item artwork">
            <a data-fancybox="gallery" href="https://htmlstream.com/preview/front-v3.2.2/documentation/assets/img/img30.jpg"><img src="https://htmlstream.com/preview/front-v3.2.2/documentation/assets/img/img21.jpg"></a>
        </div>

        <div class="cbp-item artwork ">
            <a data-fancybox="gallery" href="https://htmlstream.com/preview/front-v3.2.2/documentation/assets/img/img21.jpg"><img src="https://htmlstream.com/preview/front-v3.2.2/documentation/assets/img/img21.jpg"></a>
        </div>

    <div class="cbp-item artwork">
            <a data-fancybox="gallery" href="https://htmlstream.com/preview/front-v3.2.2/documentation/assets/img/img21.jpg"><img src="https://htmlstream.com/preview/front-v3.2.2/documentation/assets/img/img21.jpg"></a>
        </div>
    </div>
</div>
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