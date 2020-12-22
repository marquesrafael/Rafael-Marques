<?php
  $erro = "403";
  include("header.php");
?>

<body>
  <p class="back"><a href="/">Voltar a Home</a></p>
  <p id="type-in">Error <?php echo $erro; ?></p>
  <p id="type-after">Você não tem permissão de acesso nesse servidor</p>
</body>

<?php
  include("footer.php");
?>
