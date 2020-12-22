</body>
<?php 
    $qsistema = $pdo->query("SELECT * FROM sistema");
    $sistema = $qsistema->fetchAll(PDO::FETCH_ASSOC);
    foreach($sistema as $itemsistema){
?>

<footer class="bg-gray8 gray5">
    <div class="container">
        <div class="row">
            <br />
            <div class="col-12 col-md small">
                <br /><?php echo $itemsistema['website']; ?> &copy; 2019 <br />
                Endereço: <?php echo $itemsistema['endereco']; ?> <br />
                Telefone: <?php echo $itemsistema['telefone']; ?> <br />
                E-mail: <?php echo $itemsistema['email']; ?>
            </div>
            <div class="col-6 col-md">
                <br />
                <ul class="list-unstyled text-small">
                    <li><a href="index.php" class="link-gray">Home</a></li>
                    <li><a href="tipos.php" class="link-gray">Tipos de Contêineres</a></li>
                    <li><a href="empresa.php" class="link-gray">A empresa</a></li>
                    <li><a href="contato.php" class="link-gray">Contato</a></li>
                </ul>
            </div>

            <div class="col-6 col-md">
                <br />
                <h5>Follow:</h5>
                <a href="" id="gh" target="_blank" title="Twitter" class="link-gray"><i class="fab fa-twitter"></i>
                    Twitter</a>
                <br />
                <a href="" target="_blank" title="Facebook" class="link-gray"><i class="fab fa-facebook"></i>
                    Facebook</a>
            </div>
            <div class="col-6 col-md">
                <br />
                <h5>Contato:</h5>
                <p>Ficou alguma duvida? Entre em contato!</p>
                <p><a href="contato.php" title="Entre em contato" class="link-gray"><i class="fa fa-envelope"></i> Contato</a></p>

                <br /><br />
                <p class="small">Made with <i class="fas fa-heart text-danger"></i> & <i class="fas fa-coffee"></i> by Rafael Marques</p>
            </div>
        </div>
</footer>

<?php } ?>

<script src="files/js/jquery-3.4.1.min.js"></script>
<script src="files/js/bootstrap.min.js"></script>
<script src="files/js/fontawesome.js"></script>
<script src="files/js/projetos.js"></script>

</html>
