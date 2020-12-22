<?php
  $erro = "404";
  include("header.php");
?>

<body>
  <p class="back"><a href="/">Voltar a Home</a></p>
  <p id="type-in">Error <?php echo $erro; ?></p>
  <p id="type-after">Não encontramos o arquivo solicitado</p>
</body>

<?php
  include("footer.php");
?>
