<?php
include("header.php"); ?>

<div class="content" style="overflow:hidden; background:url('images/treinamentos/bg-tela-cadastro.jpg') no-repeat 0 0; height: 552px;">
  <div style="width:690px; float:left; margin-left: 254px; padding-top: 30px;">
    <h1 style="color: #10724c; font-size: 20px; margin-top: 80px;">Painel Administrativo</h1>
    <div class="sidebar-login" style="float: none; margin: 0">
    <div class="caixa-login">
      <br>
      <form action="admin-sistema.php" method="post" id="caixa-login">
        <p>login<br>
          <input type="text" name="login" id="login"> </p>
        <p>senha<br>
          <input type="password" name="senha" id="senha"></p>
        <p class="texto-right"><a href="#">Esqueceu sua senha?</a> <button type="submit" name="logar" class="bt-verde">Entrar</button> </p>
      </form>
    </div>
    </div>
  </div>
</div>
<?php include("footer.php"); ?>
