<?php
  $erro = "500";
  include("header.php");
?>

<body>
  <p class="back"><a href="/">Voltar a Home</a></p>
  <p id="type-in">Error <?php echo $erro; ?></p>
  <p id="type-after">Estamos com um erro interno. Tente novamente</p>
</body>

<?php
  include("footer.php");
?>
