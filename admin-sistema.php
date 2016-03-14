<?php 
$link = "servicos";
include("header.php"); ?>

<div class="content" style="overflow:hidden; background:url('images/treinamentos/bg-tela-cadastro.jpg') no-repeat 0 0; height: 552px;">

  <div class="sidebar-usuario">
    <p>Seja bem vindo, <br><strong>Admin</strong></p>
    <ul class="op-user">
      <li><a href="admin-minhaconta.php">Minha Conta</a></li>
      <li><a href="index.php">Sair</a></li>
    </ul>
  </div>

  <div style="width:612px; float:left; margin-left: 154px; padding-top: 30px; margin-right: 20px;">
    <h1 style="color: #10724c; font-size: 20px; margin-bottom: 30px;">Administração</h1>

    <?php if(!isset($_GET['p'])) { ?>
    <ul class="lista-eventos">
      <li>
        <a href="#" class="box-capa"><i class="fa fa-list-alt"></i></a>
        <h2 class="tituloEvento">Inscrições</h2>
        <a href="#" class="bt-entrar">Entrar</a>
      </li>
      <li>
        <a href="#" class="box-capa"><i class="fa fa-wrench"></i></a>
        <h2 class="tituloEvento">Treinamentos</h2>
        <a href="#" class="bt-entrar">Entrar</a>
      </li>
      <li>
        <a href="#" class="box-capa"><i class="fa fa-money"></i></a>
        <h2 class="tituloEvento">Financeiro</h2>
        <a href="#" class="bt-entrar">Entrar</a>
      </li>
      <li>
        <a href="#" class="box-capa"><i class="fa fa-graduation-cap"></i></a>
        <h2 class="tituloEvento">Certificados</h2>
        <a href="#" class="bt-entrar">Entrar</a>
      </li>
      <li>
        <a href="#" class="box-capa"><i class="fa fa-users"></i></a>
        <h2 class="tituloEvento">Usuários</h2>
        <a href="#" class="bt-entrar">Entrar</a>
      </li>
      <li>
        <a href="#" class="box-capa"><i class="fa fa-cogs"></i></a>
        <h2 class="tituloEvento">Configurações</h2>
        <a href="#" class="bt-entrar">Entrar</a>
      </li>
    </ul>
    <?php } ?>

  </div>

</div>
<?php include("footer.php"); ?>
