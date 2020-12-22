<?php include('common/head.php'); ?>

<?php include('common/navbar.php'); ?>

<!-- body_area_start -->
<body>



<div class="container">
    <div id="instagram-feed1" class="instagram_feed"></div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="assets/js/jquery.instagramFeed.js"></script>
    <script>
        (function($){
            $(window).on('load', function(){
                $.instagramFeed({
                    'username': 'guerrerodogland',
                    'container': "#instagram-feed1",
                    'display_profile': true,
                    'display_biography': false,
                    'display_gallery': true,
                    'callback': null,
                    'styling': true,
                    'items': 12,
                    'items_per_row': 4,
                    'margin': 0.5
                }); 

                $.instagramFeed({
                    'username': 'instagram',
                    'callback': function(data){
                        $('#jsonHere').html(JSON.stringify(data, null, 2));
                    }
                 });
            });
        })(jQuery);
    </script>
</div>

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

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