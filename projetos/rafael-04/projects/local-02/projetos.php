<?php 
    $pagina = "projetos" ;
    $titulo = "Nossos projetos";
    include "app/config.php";
    include "pages/head.php";
    include "pages/header.php";

    $qsistema = $pdo->query("SELECT * FROM sistema");
    $sistema = $qsistema->fetchAll(PDO::FETCH_ASSOC);
    foreach($sistema as $itemsistema){
?>
<div class="py-3 text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div id="photos">
               <h1>Projetos de House/Work</h1>
                <ul id="photo-gallery">
                    <?php
                        $directory = "files/img/projetos/house";
                        $images = glob($directory . "/*.jpg");
                        foreach($images as $image){
                    ?>
                    <li>
                        <a href="<?php echo $image; ?>">
                            <img src="<?php echo $image; ?>" width="228" height="152">
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="py-3 text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div id="photos">
               <h1>Algumas entregas</h1>
                <ul id="photo-gallery">
                    <?php
                        $directory = "files/img/projetos/entregas";
                        $images = glob($directory . "/*.jpg");
                        foreach($images as $image){
                    ?>
                    <li>
                        <a href="<?php echo $image; ?>">
                            <img src="<?php echo $image; ?>" width="228" height="152">
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="py-3 text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div id="photos">
               <h1>Diversos</h1>
                <ul id="photo-gallery">
                    <?php
                        $directory = "files/img/projetos/diversos";
                        $images = glob($directory . "/*.jpg");
                        foreach($images as $image){
                    ?>
                    <li>
                        <a href="<?php echo $image; ?>">
                            <img src="<?php echo $image; ?>" width="228" height="152">
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php } include "pages/footer.php"; ?>
