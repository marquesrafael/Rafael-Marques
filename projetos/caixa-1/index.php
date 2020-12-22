<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <title>Livro caixa</title>
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#147500">
    <meta name="description" content="Um site simples, minimamente desenvolvido, apenas para controle financeiro simplificado">
    <meta name="author" content="Rafael Marques, contato@rafaelmarques.net">
    <meta name="revised" content="Sunday, July 12, 2020, 8:07 AM" />
    <meta name="copyright" content="Rafael Marques">
    <meta name="Classification" content="personal">
    <meta name="language" content="Portuguese" />
    <meta name="audience" content="all" />
    <meta name="rating" content="general" />
    <link rel="icon" href="assets/img/web/favicon.png" />
    <link rel="stylesheet" href="assets/css/reset.css?v=2.0-modified">
    <link rel="stylesheet" href="assets/css/bootstrap.css?v=v4.5.0">
    <link rel="stylesheet" href="assets/css/styles.css?v=1.5">
    <link rel="stylesheet" href="assets/css/jquery-ui.css?v=1.5">
    <link rel="stylesheet" href="assets/fonts/boxicons/boxicons.css?v=1.5">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  </head>
  <?php
  session_start();
  set_time_limit(0);
  include 'config.php';
  include 'functions.php';
  if (isset($_GET['acao']) && $_GET['acao'] == 'apagar') {
  $id = $_GET['id'];
  $sql  = "DELETE FROM lc_movimento WHERE id='$id'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  header("Location: ?mes=" . $_GET['mes'] . "&ano=" . $_GET['ano'] . "&ok=2");
  exit();
  }
  if (isset($_POST['acao']) && $_POST['acao'] == 'editar_cat') {
  $id   = $_POST['id'];
  $nome = $_POST['nome'];
  $sql  = "UPDATE lc_cat SET nome='$nome' WHERE id='$id'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  header("Location: ?mes=" . $_GET['mes'] . "&ano=" . $_GET['ano'] . "&cat_ok=3");
  exit();
  }
  if (isset($_GET['acao']) && $_GET['acao'] == 'apagar_cat') {
  $id = $_GET['id'];
  $query       = $conn->query("SELECT c.id FROM lc_movimento m, lc_cat c WHERE c.id=m.cat && c.id=$id");
  $query_assoc = $query->fetchAll(PDO::FETCH_ASSOC);
  $total       = $query->rowCount();
  if ($total > 0) {
  header("Location: ?mes=" . $_GET['mes'] . "&ano=" . $_GET['ano'] . "&cat_err=1");
  exit();
  }
  $sql  = "DELETE FROM lc_cat WHERE id='$id'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  header("Location: ?mes=" . $_GET['mes'] . "&ano=" . $_GET['ano'] . "&cat_ok=2");
  exit();
  }
  if (isset($_POST['acao']) && $_POST['acao'] == 'editar_mov') {
  $id        = $_POST['id'];
  $dia       = $_POST['dia'];
  $data1       = $_POST['data'];
  $t   = explode("/", $data1);
  $dia = $t[0];
  $mes = $t[1];
  $ano = $t[2];
  $data2 = $ano . $mes . $dia;
  $tipo      = $_POST['tipo'];
  $cat       = $_POST['cat'];
  $descricao = $_POST['descricao'];
  $valor     = str_replace(",", ".", $_POST['valor']);
  $data = [
  'dia' => $dia,
  'mes' => $mes,
  'ano' => $ano,
  'data1' => $data2,
  'tipo' => $tipo,
  'cat' => $cat,
  'descricao' => $descricao,
  'valor' => $valor,
  'id' => $id,
  ];
  $sql = "UPDATE lc_movimento SET dia=:dia, mes=:mes, ano=:ano, data=:data1, tipo=:tipo, cat=:cat, descricao=:descricao, valor=:valor WHERE id=:id";
  $stmt = $conn->prepare($sql);
  $stmt->execute($data);
  header("Location: ?mes=" . $_GET['mes'] . "&ano=" . $_GET['ano'] . "&ok=3");
  exit();
  }
  if (isset($_POST['acao']) && $_POST['acao'] == 2) {
  $nome = $_POST['nome'];
  $sql  = "INSERT INTO lc_cat (nome) values ('$nome')";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  header("Location: ?mes=" . $_GET['mes'] . "&ano=" . $_GET['ano'] . "&cat_ok=1");
  exit();
  }
  if (isset($_POST['acao']) && $_POST['acao'] == 1) {
  $data      = $_POST['data'];
  $tipo      = $_POST['tipo'];
  $cat       = $_POST['cat'];
  $descricao = $_POST['descricao'];
  $valor     = str_replace(",", ".", $_POST['valor']);
  $t   = explode("/", $data);
  $dia = $t[0];
  $mes = $t[1];
  $ano = $t[2];
  $data2 = $ano . "-" . $mes . "-" . $dia;
  $sql2 = "INSERT INTO lc_movimento (dia,mes,ano,data,tipo,descricao,valor,cat) values ('$dia','$mes','$ano','$data2','$tipo','$descricao','$valor','$cat')";
  $stmt = $conn->prepare($sql2);
  $stmt->execute();
  header("Location: ?mes=" . $_GET['mes'] . "&ano=" . $_GET['ano'] . "&ok=1");
  exit();
  }
  if (isset($_GET['mes'])) {
  $mes_hoje = $_GET['mes'];
  if ($mes_hoje == 1) { $mes_hoje = "01";}
  if ($mes_hoje == 2) { $mes_hoje = "02";}
  if ($mes_hoje == 3) { $mes_hoje = "03";}
  if ($mes_hoje == 4) { $mes_hoje = "04";}
  if ($mes_hoje == 5) { $mes_hoje = "05";}
  if ($mes_hoje == 6) { $mes_hoje = "06";}
  if ($mes_hoje == 7) { $mes_hoje = "07";}
  if ($mes_hoje == 8) { $mes_hoje = "08";}
  if ($mes_hoje == 9) { $mes_hoje = "09";}
  } else {
  $mes_hoje = date('m');
  }
  if (isset($_GET['ano'])) {
  $ano_hoje = $_GET['ano'];
  } else {
  $ano_hoje = date('Y');
  }
  ?>
  <body>
    <!-- menu lateral -->
    <header id="header" class="d-flex flex-column justify-content-center">
      <nav class="nav-menu">
        <ul>
          <li class="active">
            <a href="#home"><i class="bx bx-home"></i> <span>Home</span></a>
          </li>
          <li>
            <a href="https://rafaelmarques.net/"><i class='bx bx-pointer'></i> <span>Site principal</span></a>
          </li>
        </ul>
      </nav>
    </header>
    <!-- menu lateral -->
    <main class="container">
      <nav id="home" class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">Livro Caixa - <?php echo $lc_titulo?></a>
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link" href="?mes=<?php echo date('m')?>&ano=<?php echo date('Y')?>"><strong> <?php echo date('d')?> de <?php echo mostraMes(date('m'))?> de <?php echo date('Y')?></strong></a> 
          </li>
          <li><a class="btn btn-primary" href="login.php?sair">Fazer logout</a></li>
        </ul>
      </nav>
      <nav id="home" class="navbar navbar-light bg-transparent justify-content-center">
        <ul class="nav nav-pills">
          <?php for ($i=1;$i<=12;$i++) { ?>
          <li class="nav-item">
            <a class="nav-link" href="?mes=<?php echo $i?>&ano=<?php echo $ano_hoje?>" style="<?php if ($mes_hoje==$i) {?>color:#033; font-size:16px; font-weight:bold; padding:5px<?php } else {?>font-size:16px;<?php }?>"
              <?php if ($mes_hoje==$i) {?>autofocus <?php }?>>
              <?php echo mostraMes($i);?>
            </a>
          </li>
          <?php } ?>
        </ul>
      </nav>
      <hr>
      <div class="container">
        <div class="row">
          <div class="col-5">
            <h2><?php echo mostraMes($mes_hoje)?>/<?php echo $ano_hoje?></h2>
          </div>
          <div class="col-md-auto justify-content-end">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_mov" data-target=".bd-example-modal-lg">
            Adicionar movimento
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_cat" data-target=".bd-example-modal-lg">
            Adicionar Categoria
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ger_cat" data-target=".bd-example-modal-lg">
            Gerenciar Categorias
            </button>
          </div>
        </div>
        <hr>
        <!-- Modal add movimento -->
        <div class="modal fade bd-example-modal-lg" id="add_mov" tabindex="-1" role="dialog" aria-labelledby="add_movLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar movimento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php
                $query = $conn->query("SELECT * FROM lc_cat");
                $query_assoc = $query->fetchAll(PDO::FETCH_ASSOC);
                $total = $query->rowCount();
                if ($total==0) {
                echo "Adicione ao menos uma categoria";
                } else {
                ?>
                <form method="post" action="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>">
                  <input type="hidden" name="acao" value="1" />
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Data</label>
                    <input class="form-control" id="exampleFormControlInput1" data-mask="00/00/0000" placeholder="11/11/1111" name="data" value="<?php echo date('d')?>/<?php echo $mes_hoje?>/<?php echo $ano_hoje?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Tipo de movimento</label>
                    <br />
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="tipo" value="1" id="tipo_receita">
                      <label class="form-check-label" for="inlineRadio1">Receita</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="tipo" value="0" id="tipo_despesa">
                      <label class="form-check-label" for="inlineRadio2">Despesa</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Categoria</label>
                    <select class="form-control" name="cat" id="exampleFormControlSelect1">
                      <?php foreach ($query_assoc as $row) { ?>
                      <option value="<?php echo $row['id']?>"><?php echo $row['nome']?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descrição</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Valor</label>
                    <input class="form-control" id="exampleFormControlInput1" placeholder="R$5555.55" name="valor">
                  </div>
                  <?php } ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="submit" value="Enviar" class="btn btn-primary">Adicionar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Modal add categoria -->
        <div class="modal fade bd-example-modal-lg" id="add_cat" tabindex="-1" role="dialog" aria-labelledby="add_catLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar categorias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>">
                  <input type="hidden" name="acao" value="2" />
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome da categoria</label>
                    <input type="text" class="form-control" name="nome" id="cat-name-input" aria-describedby="catAdd" placeholder="Nome da categoria">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="submit" value="Enviar" class="btn btn-primary">Adicionar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Modal ger categoria -->
        <div class="modal fade bd-example-modal-lg" id="ger_cat" tabindex="-1" role="dialog" aria-labelledby="ger_catLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gerenciar categorias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Nome</th>
                      <th scope="col">Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = $conn->query("SELECT id, nome FROM lc_cat");
                    $query_assoc = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($query_assoc as $row) {
                    ?>
                    <tr id="editar2_cat_<?php echo $row['id']?>">
                      <td><?php echo $row['nome']?></td>
                      <td>
                        <a onclick="return confirm('Tem certeza que deseja remover esta categoria?\nAtenÃ§Ã£o: apenas categorias sem movimentos serÃ£o excluidas!')"
                        href="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>&acao=apagar_cat&id=<?php echo $row['id']?>" title="Remover"><i class='bx bxs-trash'></i></a>
                        <a href="javascript:;" onclick="document.getElementById('editar_cat_<?php echo $row['id']?>').style.display=''; document.getElementById('editar2_cat_<?php echo $row['id']?>').style.display='none'" title="Editar"><i
                        class='bx bxs-pencil'></i></a>
                      </td>
                    </tr>
                    <div style="display:none" id="editar_cat_<?php echo $row['id']?>">
                      <form method="post" action="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>">
                        <input type="hidden" name="acao" value="editar_cat" />
                        <input type="hidden" name="id" value="<?php echo $row['id']?>" />
                        <div class="row">
                          <div class="col-sm-6 col-md-8"><input type="text" name="nome" value="<?php echo $row['nome']?>" class="form-control" /></div>
                          <div class="col-6 col-md-4"><button type="submit" value="Alterar" class="btn btn-primary mb-2">Alterar</button></div>
                        </div>
                      </form>
                    </div>
                    <?php
                    } ?>
                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>
        <?php if (isset($_GET['cat_err']) && $_GET['cat_err']==1) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Esta categoria não pode ser removida, pois existem movimentos associados!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php } ?>
        <?php if (isset($_GET['cat_ok']) && $_GET['cat_ok']==2) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Categoria removida com sucesso!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php } ?>
        <?php if (isset($_GET['cat_ok']) && $_GET['cat_ok']==1) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Categoria cadastrada com sucesso!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php } ?>
        <?php if (isset($_GET['cat_ok']) && $_GET['cat_ok']==3) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Categoria alterada com sucesso!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php } ?>
        <?php if (isset($_GET['ok']) && $_GET['ok']==1) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Movimento cadastrado com sucesso!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php } ?>
        <?php if (isset($_GET['ok']) && $_GET['ok']==2) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Movimento removido com sucesso!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php } ?>
        <?php if (isset($_GET['ok']) && $_GET['ok']==3) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Movimento alterado com sucesso!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php } ?>
        <?php
        $entradas = $conn->query("SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=1 && mes='$mes_hoje' && ano='$ano_hoje'")->fetch(PDO::FETCH_ASSOC);
        $entradas = $entradas['total'];
        $saidas = $conn->query("SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=0 && mes='$mes_hoje' && ano='$ano_hoje'")->fetch(PDO::FETCH_ASSOC);
        $saidas = $saidas['total'];
        $resultado_mes=$entradas-$saidas;
        ?>
        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-3 mb-lg-0">
              <div class="card <?php if ($resultado_mes < 0) { echo 'bg-danger'; } else { echo 'bg-success'; }  ?> text-white p-4 mb-3">
                <div class="d-flex justify-content-center align-items-center">
                  <span class="display-4"><?php echo formata_dinheiro($resultado_mes) ?></span>
                  <div class="ml-3">
                    <span><span class="font-weight-bold">/no mês</span>
                  </div>
                </div>
              </div>
              <ul class="list-unstyled list-sm-article">
                <li>
                  <a class="row align-items-center mx-n2 font-size-1">
                    <div class="col-3 px-2">
                      <span class="text-dark">Entrada</span>
                    </div>
                    <div class="col-6 px-2">
                      <div class="progress" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-3 text-right px-2">
                      <span><?php echo formata_dinheiro($entradas) ?></span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="row align-items-center mx-n2 font-size-1">
                    <div class="col-3 px-2">
                      <span class="text-dark">saidas</span>
                    </div>
                    <div class="col-6 px-2">
                      <div class="progress" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-3 text-right px-2">
                      <span><?php echo formata_dinheiro($saidas) ?></span>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
            <?php
            $entradas = $conn->query("SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=1 ")->fetch(PDO::FETCH_ASSOC);
            $entradas = $entradas['total'];
            $saidas = $conn->query("SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=0 ")->fetch(PDO::FETCH_ASSOC);
            $saidas = $saidas['total'];
            $resultado_geral=$entradas-$saidas;
            ?>
            <div class="col-lg-6 mb-3 mb-lg-0">
              <div class="card <?php if ($resultado_geral < 0) { echo 'bg-danger'; } else { echo 'bg-success'; }  ?> text-white p-4 mb-3">
                <div class="d-flex justify-content-center align-items-center">
                  <span class="display-4"><?php echo formata_dinheiro($resultado_geral) ?></span>
                  <div class="ml-3">
                    <span><span class="font-weight-bold">/no geral</span>
                  </div>
                </div>
              </div>
              <ul class="list-unstyled list-sm-article">
                <li>
                  <a class="row align-items-center mx-n2 font-size-1">
                    <div class="col-3 px-2">
                      <span class="text-dark">Entrada</span>
                    </div>
                    <div class="col-6 px-2">
                      <div class="progress" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-3 text-right px-2">
                      <span><?php echo formata_dinheiro($entradas) ?></span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="row align-items-center mx-n2 font-size-1">
                    <div class="col-3 px-2">
                      <span class="text-dark">saidas</span>
                    </div>
                    <div class="col-6 px-2">
                      <div class="progress" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-3 text-right px-2">
                      <span><?php echo formata_dinheiro($saidas) ?></span>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="container space-2">
            <!-- Title -->
            <div class="d-flex justify-content-between align-items-end border-bottom pb-3 mb-7">
              <h1 class="h3 mb-0">Movimentos</h1>
              <span>
                <form name="form_filtro_cat" method="get" action="">
                  <input type="hidden" name="mes" value="<?php echo $mes_hoje?>">
                  <input type="hidden" name="ano" value="<?php echo $ano_hoje?>">
                  <div class="form-group">
                    <select class="form-control" name="filtro_cat" onchange="form_filtro_cat.submit()">
                      <option value="">Tudo</option>
                      <?php
                      $query = $conn->query("SELECT DISTINCT c.id, c.nome FROM lc_cat c, lc_movimento m WHERE m.cat=c.id && m.mes='$mes_hoje' && m.ano='$ano_hoje'");
                      $query_assoc = $query->fetchAll(PDO::FETCH_ASSOC);
                      foreach ($query_assoc as $row) {
                      ?>
                      <option <?php if (isset($_GET['filtro_cat']) && $_GET['filtro_cat']==$row['id']) { echo "selected=selected"; } ?> value="<?php echo $row['id']?>"><?php echo $row['nome']?></option>
                      <?php } ?>
                    </select>
                    <input type="submit" value="Filtrar"  />
                  </div>
                </form>
              </div>
            </span>
          </div>
          <!-- Table -->
          <div class="table-responsive">
            <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle">
              <thead class="thead-light">
                <tr>
                  <th>Dia</th>
                  <th>Descrição</th>
                  <th>Categoria</th>
                  <th>Valor</th>
                  <th>Tipo</th>
                  <th>Ação</th>
                  <th style="width: 5%;"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $filtros="";
                if (isset($_GET['filtro_cat'])) {
                if ($_GET['filtro_cat']!='') {
                $filtros="&& cat='".$_GET['filtro_cat']."'";
                $entradas = $conn->query("SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=1 && mes='$mes_hoje' && ano='$ano_hoje' $filtros")->fetch(PDO::FETCH_ASSOC);
                $entradas = $entradas['total'];
                $saidas = $conn->query("SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=0 && mes='$mes_hoje' && ano='$ano_hoje' $filtros")->fetch(PDO::FETCH_ASSOC);
                $saidas = $saidas['total'];
                $resultado_mes=$entradas-$saidas;
                }
                }
                $query = $conn->query("SELECT * FROM lc_movimento WHERE mes='$mes_hoje' && ano='$ano_hoje' $filtros ORDER By dia");
                $query_assoc = $query->fetchAll(PDO::FETCH_ASSOC);
                $cont=0;
                foreach ($query_assoc as $row) {
                $cont++;
                $cat=$row['cat'];
                $query2 = $conn->query("SELECT nome FROM lc_cat WHERE id='$cat'");
                $query_assoc2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                foreach ($query_assoc2 as $row2) {
                $categoria=$row2['nome'];
                } ?>
                <tr>
                  <td>
                    <?php echo $row['dia']?>
                  </td>
                  <td>
                    <?php echo $row['descricao']?>
                  </td>
                  <td>
                    <a href="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>&filtro_cat=<?php echo $cat?>"><?php echo $categoria?></a>
                  </td>
                  <td>
                    <?php if ($row['tipo']==0) { echo "-"; } else { echo "+";} ?><?php echo formata_dinheiro($row['valor'])?>
                  </td>
                  <td>
                    <?php if ($row['tipo']==0) { echo "Saida"; } else { echo "Entrada";} ?>
                  </td>
                  <td>
                    <a type="button" class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#editar_mov_<?php echo $row['id']?>" data-target=".bd-example-modal-lg" onclick="document.getElementById('editar_mov_<?php echo $row['id']?>').style.display='';  " title="Editar"><i class='bx bx-edit-alt'></i></a>
                  </td>
                </tr>

                <!-- Modal editar movimento -->
                <div class="modal fade bd-example-modal-lg" id="editar_mov_<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="add_catLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['descricao']?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>">
                          <input type="hidden" name="acao" value="editar_mov" />
                          <input type="hidden" name="id" value="<?php echo $row['id']?>" />
                          <div class="form-group">
                            <label class="form-control-label">Dia</label>  <?php echo date('Y-m-d', strtotime($row['data'])); ?>

                            <input type="text" class="form-control input-mask" name="data" data-mask="00/00/0000" value="<?php echo date('d/m/Y', strtotime($row['data'])); ?>" placeholder="<?php echo date('d/m/Y', strtotime($row['data'])); ?>">
                          </div>
                          <div class="form-group">
                            <label class="form-control-label">Tipo</label>
                            <br />
                            <label for="tipo_receita<?php echo $row['id']?>">
                              <input <?php if ($row['tipo']==1) { echo "checked=checked"; } ?> type="radio" name="tipo" value="1" id="tipo_receita<?php echo $row['id']?>" />
                              Receita
                            </label>
                            <label for="tipo_despesa<?php echo $row['id']?>" >
                              <input <?php if ($row['tipo']==0) { echo "checked=checked"; } ?> type="radio" name="tipo" value="0" id="tipo_despesa<?php echo $row['id']?>" />
                              Despesa
                            </label>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Categoria</label>
                            <select class="form-control" name="cat" id="exampleFormControlSelect1">
                              <?php
                              $query2 = $conn->query("SELECT * FROM lc_cat");
                              $query_assoc2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                              foreach ($query_assoc2 as $row2) {
                              ?>
                              <option <?php if ($row2['id'] == $row['cat']) {
                                echo "selected";
                              } ?> value="<?php echo $row2['id']?>"><?php echo $row2['nome']?></option>
                              <?php
                              } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label class="form-control-label">Valor</label>
                            <input type="money" class="form-control" id="money" value="<?php echo $row['valor']?>" name="valor" placeholder="<?php echo $row['valor']?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descrição</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao"><?php echo $row['descricao']?></textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <a  type="button" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja apagar?')" href="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>&acao=apagar&id=<?php echo $row['id']?>" title="Remover">Excluir</a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          <button type="submit" value="Alterar" class="btn btn-primary">Atualizar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </tbody>
            </table>

            <!-- Footer -->
<footer class="page-footer font-small bg-light">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright <?php echo $lc_titulo?> - Desenvolvido por <a href=http://www.paulocollares.com.br>Paulo Collares</a> na versão 1.3. Atualizado por Rafael Marques.</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/typed.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/jquery-ui.js"></script>
        <script src="assets/js/jquery.mask.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      </body>
    </html>