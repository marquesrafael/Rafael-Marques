<?php 
    $pagina = "contato" ;
    $titulo = "Contato";
    include "app/config.php";
    include "pages/head.php";
    include "pages/header.php";

    $qsistema = $pdo->query("SELECT * FROM funcionarios ORDER BY nome DESC");
    $sistema = $qsistema->fetchAll();

?>

<body>
    <div class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-5 p-4">
                    <p>Atendemos via whatswapp, telefone ou email.</p>
                    <p>Ou se preferir, poderá entrar em contato através do formulario ao lado, que entraremos em contato o mais rápido possivel!</p>
                    <p class="lead mt-3"> <b>Contatos</b> </p>

                    <?php 
                        foreach($sistema as $row)
                        {
                    ?>
                    <b><?php echo $row['nome'] . ' ' . $row['sobrenome'] . '<br />'; ?></b>
                    Telefone: <a href="tel:+55<?php echo $row['telefone']; ?>"><?php echo $row['telefone']; ?></a> <br />
                    Email: <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a> <br />
                    Whatsapp: <a href="https://wa.me/55<?php echo $row['whatsapp']; ?>"><?php echo $row['whatsapp']; ?></a> <br />
                    <br />
                    <?php } ?>
                </div>

                <div class="col-md-7 p-4">

                    <form class="" action="envio.php" name="form_contato" method="post" >
                        <div class="form-group">
                            <label>Tipo <span style="color: red;">*</span>:</label><br />
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo" id="inlineRadio1" value="fisica">
                                <label class="form-check-label" for="inlineRadio1">Pessoa Fisica</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo" id="inlineRadio2" value="juridica">
                                <label class="form-check-label" for="inlineRadio2">Pessoa juridica</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nome <span style="color: red;">*</span>:</label>
                            <input type="text" name="nome" class="form-control" placeholder="Seu nome/Nome da empresa" required="required">
                        </div>

                        <div class="form-group">
                            <label>CPF/CNPJ:</label>
                            <input type="number" name="cpf/cnpj" class="form-control" placeholder="Seu CPF/CNPJ da empresa">
                        </div>

                        <div class="form-group">
                            <label>Telefone <span style="color: red;">*</span>:</label>
                            <input type="tel" name="telefone" class="form-control" placeholder="(11) 11111-1111" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" required="required">
                        </div>

                        <div class="form-group">
                            <label>Email <span style="color: red;">*</span>:</label>
                            <input type="email" name="email" class="form-control" placeholder="contato@nome.com">
                        </div>

                        <div class="form-group">
                            <label>Mensagem <span style="color: red;">*</span>:</label>
                            <textarea name="mensagem" class="form-control" id="form26" rows="5" placeholder="Sua mensagem..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<?php  include "pages/footer.php"; ?>
