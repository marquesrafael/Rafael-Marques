<?php
    $pagina = "Contato";
    $id     = "4";

    include("common/header.php");
?>

  <!-- banner -->
  <div class="banner_w3lspvt-2">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php" class="font-weight-bold">Home</a></li>
      <li class="breadcrumb-item" aria-current="page">Contato</li>
    </ol>
  </div>
  <!-- //banner -->

  <!-- map -->
  <div class="w3l-map p-4">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14584.117390180927!2d-46.31450735!3d-23.959402349999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce03b40b36efb7%3A0xfade85c1fe817281!2sR.%20Alm.%20Tamandar%C3%A9%2C%20216%20-%20Macuco%2C%20Santos%20-%20SP%2C%2011015-250!5e0!3m2!1spt-BR!2sbr!4v1581510677188!5m2!1spt-BR!2sbr"></iframe>
  </div>
  <!-- //map -->

  <!-- contact -->
  <div class="contact py-5" id="contact">
    <div class="container pb-xl-5 pb-lg-3">
      <div class="row">
        <div class="col-lg-6">
          <img src="assets/images/b2.png" alt="image" class="img-fluid" />
        </div>
        <div class="col-lg-6 mt-lg-0 mt-5">
          <!-- contact form grid -->
          <div class="contact-top1">
            <form action="#" method="post" class="contact-wthree-do">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label>
                      Primeiro nome
                    </label>
                    <input class="form-control" type="text" placeholder="Anderson" name="name" required="">
                  </div>
                  <div class="col-md-6 mt-md-0 mt-4">
                    <label>
                      Ultimo nome
                    </label>
                    <input class="form-control" type="text" placeholder="Santos" name="name" required="">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label>
                      Telefone
                    </label>
                    <input class="form-control" type="text" placeholder="xx xxxxx-xxxx" name="mobile" required="">
                  </div>
                  <div class="col-md-6 mt-md-0 mt-4">
                    <label>
                      Email
                    </label>
                    <input class="form-control" type="email" placeholder="exemplo@mail.com" name="email" required="">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <label>
                      Sua mensagem
                    </label>
                    <textarea placeholder="Sua duvida/sugestão/reclamação/elogio" name="message" class="form-control"></textarea>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-cont-w3 btn-block mt-4">Enviar</button>
                </div>
              </div>
            </form>
          </div>
          <!-- //contact form grid ends here -->
        </div>
      </div>
    </div>
  </div>
  <!-- //contact-->
<?php include("common/footer.php"); ?>
