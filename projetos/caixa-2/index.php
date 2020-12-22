<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>Controle financeiro simplicado</title>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Google Fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/boxicons/boxicons.css?v=1.5">
    <script src="https://kit.fontawesome.com/935f2f9ace.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="assets/vendor/jquery-ui/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/vendor/prism/prism.css">
    <!-- CSS Template -->
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/css/layout.css">
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
  $id         = $_POST['id'];
  $dia        = $_POST['dia'];
  $data1      = $_POST['data'];
  $t          = explode("/", $data1);
  $dia        = $t[0];
  $mes        = $t[1];
  $ano        = $t[2];
  $data2      = $ano . $mes . $dia;
  $tipo       = $_POST['tipo'];
  $cat        = $_POST['cat'];
  $descricao  = $_POST['descricao'];
  $valor      = str_replace(",", ".", $_POST['valor']);
  $data       = [
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
  $data       = $_POST['data'];
  $tipo       = $_POST['tipo'];
  $cat        = $_POST['cat'];
  $descricao  = $_POST['descricao'];
  $valor      = str_replace(",", ".", $_POST['valor']);
  $t          = explode("/", $data);
  $dia        = $t[0];
  $mes        = $t[1];
  $ano        = $t[2];
  $data2      = $ano . "-" . $mes . "-" . $dia;
  $sql2       = "INSERT INTO lc_movimento (dia,mes,ano,data,tipo,descricao,valor,cat) values ('$dia','$mes','$ano','$data2','$tipo','$descricao','$valor','$cat')";
  $stmt       = $conn->prepare($sql2);
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
  <body class="bg-white">
    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-4 col-lg-3 col-xl-2 bg-dark text-white duik-sidebar duik-sidebar--dark ui-autocomplete-wrapper--dark navbar-expand-md pt-0">
          <div class="d-flex justify-content-between bg-black-soft w-100">
            <a class="d-block w-md-100 p-3 mr-md-0" href="home-page-1.html">
              <span class="small">
                <span class="badge badge-light text-space-1">V2.0 ALPHA</span>
              </span>
            </a>
            <!-- Responsive Toggle Button -->
            <button class="btn btn-link text-white pl-0 d-md-none" type="button" data-toggle="collapse" data-target="#sidebar-nav" aria-controls="sidebar-nav" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30" width="30" height="30" focusable="false">
              <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/>
            </svg>
            </button>
            <!-- End Responsive Toggle Button -->
          </div>
          <!-- Header Search -->
          <div class="mb-4">
            <input class="js-search form-control form-control-sm w-100 form-control-dark bg-white-11 text-white border-0 rounded-0" type="text" placeholder="Pesquisa..." aria-label="Search..." data-url="assets/include/json/autocomplete-data-for-documentation-search.json">
          </div>
          <!-- End Header Search -->
          <!-- Sidebar Nav -->
          <div class="collapse navbar-collapse " id="sidebar-nav">
            <div class="js-scrollbar duik-sidebar-sticky duik-sidebar-sticky--mini">
              <h5 class="duik-sidebar__heading text-white">Meses para consulta</h5>
              <ul class="duik-sidebar__nav">
                <?php for ($i=1;$i<=12;$i++) { ?>
                <li class="duik-sidebar__item"><a class="duik-sidebar__link <?php if ($mes_hoje==$i) {?>active<?php }?>" href="?mes=<?php echo $i?>&ano=<?php echo $ano_hoje?>" <?php if ($mes_hoje==$i) {?>autofocus<?php }?>><?php echo mostraMes($i);?></a></li>
                <?php } ?>
              </ul>
              <h5 class="duik-sidebar__heading text-white"><?php echo $lc_titulo?></h5>
              <ul class="duik-sidebar__nav">
                <li class="duik-sidebar__item"><a class="duik-sidebar__link" href="#">Sobre o sistema</a></li>
              </ul>
            </div>
          </div>
          <!-- End Sidebar Nav -->
          <!-- Fast Links -->
          <ul class="duik-sidebar__nav mb-0">
            <li class="duik-sidebar__item"><a class="duik-sidebar__link" href="https://rafaelmarques.net/" target="_blank"><i class="fa fa-desktop mr-2"></i> Site principal</a></li>
            <li class="duik-sidebar__item"><a class="duik-sidebar__link" href="login.php?sair"><i class="fas fa-sign-out-alt"></i> Sair do sistema</a></li>
          </ul>
          <!-- End Fast Links -->
          <hr class="mt-0 mt-md-3 mb-4">
          <div class="px-3 pb-5">
            <a class="btn btn-sm btn-block btn-secondary" data-toggle="modal" data-target="#gerenciarCategoriasModal" ><i class="fas fa-list-ul"></i> Categorias </a>
            <a class="btn btn-sm btn-block btn-primary" data-toggle="modal" data-target="#adicionarMovimentoModal" ><i class="fas fa-plus-circle"></i> Novo movimento</a>
          </div>
        </nav>
        <!-- modal categorias -->
        <div class="modal fade" id="gerenciarCategoriasModal" tabindex="-1" role="dialog" aria-labelledby="vertically-centered-modal" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Categoria</th>
                        <th scope="col" width="16">Ação</th>
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
                          <a class="u-link mr-2 link-muted" href="javascript:;" onclick="document.getElementById('editar_cat_<?php echo $row['id']?>').style.display=''; document.getElementById('editar2_cat_<?php echo $row['id']?>').style.display='none'" ><i class="fas fa-pencil-alt"></i></a>
                          <a class="link-muted" onclick="return confirm('Tem certeza que deseja remover esta categoria?\nAtenção: apenas categorias sem movimentos serão excluidas!')"
                          href="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>&acao=apagar_cat&id=<?php echo $row['id']?>" data-toggle="sweet-alert" data-sweet-alert="warning"><i class="fa fa-trash"></i></a>

                        </td>
                      </tr>
                      <div style="display:none" id="editar_cat_<?php echo $row['id']?>">
                        <form method="post" action="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>">
                          <input type="hidden" name="acao" value="editar_cat" />
                          <input type="hidden" name="id" value="<?php echo $row['id']?>" />
                          <div class="row">
                            <div class="col-sm-6 col-md-8">
                              <input type="text" name="nome" value="<?php echo $row['nome']?>" class="form-control" /></div>
                              <div class="col-6 col-md-4"><button type="submit" value="Alterar" class="btn btn-primary mb-2">Alterar</button></div>
                            </div>
                          </form>
                        </div>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#adicionarCategoriaModal">Adicionar Categoria</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- modal categorias -->
          <!-- Modal adicionar categoria -->
          <div class="modal fade" id="adicionarCategoriaModal" tabindex="-1" role="dialog" aria-labelledby="adicionarCategoriaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="adicionarCategoriaModal">Adicionar categoria</h5>
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
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                    <button type="submit" value="Enviar" class="btn btn-success">Adicionar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal adicionar categoria -->
        <!-- Modal adicionar movimento -->
        <div class="modal fade" id="adicionarMovimentoModal" tabindex="-1" role="dialog" aria-labelledby="adicionarMovimentoModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="adicionarMovimentoModalLabel">Novo movimento</h5>
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
                    <label class="form-control-label">Data do movimento</label>
                    <div class="input-group input-group-merge">
                      <input type="text" class="form-control input-mask" data-mask="00/00/0000" placeholder="DD/MM/AAAA" name="data" value="<?php echo date('d')?>/<?php echo $mes_hoje?>/<?php echo $ano_hoje?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Tipo de movimento</label>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="tipo" value="1" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Entrada</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio2" name="tipo" value="0" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio2">Saida</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Categoria</label>
                    <div class="input-group input-group-merge">
                      <select class="custom-select" name="cat">
                        <?php foreach ($query_assoc as $row) { ?>
                        <option value="<?php echo $row['id']?>"><?php echo $row['nome']?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group mb-4">
                    <div class="d-flex align-items-center justify-content-between">
                      <div>
                        <label class="form-control-label">Descrição</label>
                      </div>
                    </div>
                    <div class="input-group input-group-merge">
                      <textarea class="form-control" name="descricao"  placeholder="Descrição do movimento" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group mb-4">
                    <div class="d-flex align-items-center justify-content-between">
                      <div>
                        <label class="form-control-label">Valor</label>
                      </div>
                    </div>
                    <div class="input-group input-group-merge">
                      <input type="text" class="form-control input-mask money2" id="money2" placeholder="0000,00" name="valor">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                    <button type="submit" value="Enviar" class="btn btn-success">Adicionar</button>
                  </div>
                </form>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal adicionar movimento -->
        <!-- End Sidebar -->
        <main class="ml-sm-auto col-md-8 col-lg-9 col-xl-10 px-4 pt-4">
          <div class="row pt-3">

            <!-- Content -->
            <div class="col-xl-10 order-xl-1 duik-content-2 border-bottom">
              <div class="border-bottom mb-7">
                <h1 class="font-weight-bold"><?php echo mostraMes($mes_hoje)?>/<small><?php echo $ano_hoje?></small></h1>
                <p class="lead mb-5">Acompanhando movimentos do mês <?php echo mostraMes($mes_hoje)?>/<?php echo $ano_hoje?></p>
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
              <!-- card -->
              <div id="doc-card" class="mb-7">
                <div class="row">
                  <?php
                  $entradas = $conn->query("SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=1 && mes='$mes_hoje' && ano='$ano_hoje'")->fetch(PDO::FETCH_ASSOC);
                  $entradas = $entradas['total'];
                  $saidas = $conn->query("SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=0 && mes='$mes_hoje' && ano='$ano_hoje'")->fetch(PDO::FETCH_ASSOC);
                  $saidas = $saidas['total'];
                  $resultado_mes=$entradas-$saidas;
                  ?>
                  <!-- card resultado mes -->
                  <div class="col-lg-6 mb-3 mb-lg-0">
                    <div class="card <?php if ($resultado_mes < 0) { echo 'bg-danger'; } else { echo 'bg-success'; }  ?> text-white p-4 mb-3">
                      <div class="d-flex justify-content-center align-items-center">
                        <span class="display-4"><?php echo formata_dinheiro($resultado_mes) ?></span>
                        <div class="ml-3">
                          <span class="font-weight-bold">/no mês <a class="js-anchor-link duik-anchorjs-link" href="#doc-card" aria-label="Anchor" data-anchorjs-icon="#"></a></span>
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
                  <!-- card resultado mes -->
                  <?php
                  $entradas = $conn->query("SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=1 ")->fetch(PDO::FETCH_ASSOC);
                  $entradas = $entradas['total'];
                  $saidas = $conn->query("SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=0 ")->fetch(PDO::FETCH_ASSOC);
                  $saidas = $saidas['total'];
                  $resultado_geral=$entradas-$saidas;
                  ?>
                  <!-- card resultado geral -->
                  <div class="col-lg-6 mb-3 mb-lg-0">
                    <div class="card <?php if ($resultado_geral < 0) { echo 'bg-danger'; } else { echo 'bg-success'; }  ?> text-white p-4 mb-3">
                      <div class="d-flex justify-content-center align-items-center">
                        <span class="display-4"><?php echo formata_dinheiro($resultado_geral) ?></span>
                        <div class="ml-3">
                          <span class="font-weight-bold">/no geral</span>
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
                  <!-- card resultado geral -->
                </div>
              </div>
              <!-- End card -->
              <!-- table -->
              <div id="doc-table" class="mb-7">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col" width="20">Dia</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Tipo</th>
                        <th class="text-center" scope="col" width="20">Ação</th>
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
                      }
                      ?>
                      <tr id="link-exclusivo-<?php echo $row['id']?>">
                        <td><?php echo $row['dia']?></td>
                        <td><?php echo $row['descricao']?></td>
                        <td><?php if ($row['tipo']==0) { echo "-"; } else { echo "+";} ?><?php echo formata_dinheiro($row['valor'])?></td>
                        <td>
                          <a href="#" data-toggle="tooltip" data-placement="bottom" data-original-title="Pesquisar mais desta categoria" class="badge badge-success" href="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>&filtro_cat=<?php echo $cat?>"><?php echo $categoria?></a>
                        </td>
                        <td><?php if ($row['tipo']==0) { echo "Saida"; } else { echo "Entrada";} ?></td>
                        <td class="text-center">
                          <a class="link mr-2 link-muted" data-toggle="modal" data-target="#editar_mov_<?php echo $row['id']?>" data-target=".bd-example-modal-lg">
                            <i class="fa fa-pencil" data-toggle="tooltip" data-placement="bottom" data-original-title="Editar movimento"></i>
                          </a>
                          <a class="link-muted" data-toggle="tooltip" data-placement="bottom" data-original-title="Excluir movimento" onclick="return confirm('Tem certeza que deseja apagar esse movimento?')" href="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>&acao=apagar&id=<?php echo $row['id']?>">
                            <i class="fa fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                      <!-- Modal editar movimento -->
                      <div class="modal fade" id="editar_mov_<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="editar_mov_<?php echo $row['id']?>Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editar_mov_<?php echo $row['id']?>Label"><?php echo $row['descricao']?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="?mes=<?php echo $mes_hoje?>&ano=<?php echo $ano_hoje?>">
                                <input type="hidden" name="acao" value="editar_mov" />
                                <input type="hidden" name="id" value="<?php echo $row['id']?>" />
                                <div class="form-group">
                                  <label class="form-control-label">Data do movimento</label>
                                  <div class="input-group input-group-merge">
                                    <input type="text" class="form-control input-mask" data-mask="00/00/0000" placeholder="DD/MM/AAAA" name="data" value="<?php echo date('d/m/Y', strtotime($row['data'])); ?>">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="form-control-label">Tipo de movimento</label>
                                  <div class="custom-control custom-radio">
                                    <label for="tipo_receita<?php echo $row['id']?>">
                                      <input <?php if ($row['tipo']==1) { echo "checked=checked"; } ?> type="radio" name="tipo" value="1" id="tipo_receita<?php echo $row['id']?>" />
                                      Entrada
                                    </label>
                                  </div>
                                  <div class="custom-control custom-radio">
                                    <label for="tipo_despesa<?php echo $row['id']?>" >
                                      <input <?php if ($row['tipo']==0) { echo "checked=checked"; } ?> type="radio" name="tipo" value="0" id="tipo_despesa<?php echo $row['id']?>" />
                                      Saida
                                    </label>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="form-control-label">Categoria</label>
                                  <div class="input-group input-group-merge">
                                    <select class="custom-select" name="cat">
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
                                </div>
                                <div class="form-group mb-4">
                                  <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                      <label class="form-control-label">Descrição</label>
                                    </div>
                                  </div>
                                  <div class="input-group input-group-merge">
                                    <textarea class="form-control" name="descricao"  placeholder="Descrição do movimento" rows="3"><?php echo $row['descricao']?></textarea>
                                  </div>
                                </div>
                                <div class="form-group mb-4">
                                  <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                      <label class="form-control-label">Valor</label>
                                    </div>
                                  </div>
                                  <div class="input-group input-group-merge">
                                    <input type="text" class="form-control input-mask money2" id="money2" placeholder="0000,00" name="valor" value="<?php echo $row['valor']?>">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                  <button type="submit" value="Enviar" class="btn btn-success">Alterar</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal editar movimento -->
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- end table -->
            </div>
            <!-- End Content -->
          </div>
          <!-- Footer -->
          <footer class="small py-4">
            <div class="row">
              <!-- Copyright -->
              <div class="col-md-6 text-center text-dark text-md-left mb-3 mb-md-0">
                &copy; 2020 <?php echo $lc_titulo?>. Version 1.3 by <a href=http://www.paulocollares.com.br>Paulo Collares</a>.  Version 2.0 by <a href=https://rafaelmarques.net/>Rafael Marques</a>. All Rights Reserved.
              </div>
              <!-- End Copyright -->
              <!-- Social Icons -->
              <div class="col-md-6 col-xl-4 align-self-center">
                <ul class="list-inline text-center text-md-right mb-0">
                  <li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Github">
                    <a class="text-dark" target="_blank" href="https://github.com/marquesrafael">
                      <i class="fab fa-github"></i>
                    </a>
                  </li>
                  <li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                    <a class="text-dark" target="_blank" href="https://www.facebook.com/smarques.rafael">
                      <i class="fab fa-facebook"></i>
                    </a>
                  </li>
                  <li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram">
                    <a class="text-dark" target="_blank" href="https://www.instagram.com/smarques.rafael">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </li>
                  <li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                    <a class="text-dark" target="_blank" href="https://twitter.com/smarquesrafael">
                      <i class="fab fa-twitter"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- End Social Icons -->
            </div>
          </footer>
          <!-- End Footer -->
        </main>
      </div>
    </div>
    <!-- Go to Top -->
    <a class="js-go-to duik-go-to" href="javascript:;">
      <span class="fa fa-arrow-up duik-go-to__inner"></span>
    </a>
    <!-- End Go to Top -->
    <!-- JS Global Compulsory -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- JS Implementing Plugins -->
    <script src="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/vendor/jquery-ui/jquery-ui.core.min.js"></script>
    <script src="assets/vendor/jquery-ui/ui/widgets/menu.js"></script>
    <script src="assets/vendor/jquery-ui/ui/widgets/mouse.js"></script>
    <script src="assets/vendor/jquery-ui/ui/widgets/autocomplete.js"></script>
    <script src="assets/vendor/prism/prism.js"></script>
    <!-- JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/autocomplete.js"></script>
    <script src="assets/js/custom-scrollbar.js"></script>
    <script src="assets/js/jquery.mask.min.js"></script>
  </body>
</html>
