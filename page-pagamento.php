<?php
include("header.php"); ?>

<div class="content" style="overflow:hidden; background:url('images/treinamentos/bg-tela-cadastro.jpg') no-repeat 0 0; height: 552px;">

  <div class="sidebar-usuario">
    <p>Seja bem vindo, <br><strong>Leandro Ribeiro</strong></p>
    <ul class="op-user">
      <li><a href="page-minhaconta.php">Minha Conta</a></li>
      <li><a href="index.php">Sair</a></li>
    </ul>
    <ul class="lista-eventos" style="margin-top: 30px;">
      <li>
        <a href="#" class="box-capa"><img src="images/treinamentos/capa-treinamento.jpg" alt="Treinamentos"></a>
        <h2 class="tituloEvento">Academia Rain Bird<br>Salvador/BA<br>29/fev a 04/mar</h2>
      </li>
    </ul>
  </div>

  <div style="width:612px; float:left; margin-left: 154px; padding-top: 30px; margin-right: 20px;">
    <h1 style="color: #10724c; font-size: 20px;">Conclusão de sua inscrição - Pagamento</h1>

      <p><strong style="font-size: 15px; color: #10724c">Treinamento escolhido:</strong><br>Academia Rain Brid - Salvador/BA - 29/fev a 04/mar</p>

      <p><strong style="font-size: 15px;color: #10724c">Módulos Selecionados:</strong></p>

      <p><strong>A2 - Produtos de Irrigação para Jardins e Gramados</strong><br><strong>DBL:</strong> R$ 900</p>
      <p><strong>C2 - Sistemas de Bombeamento</strong><br><strong>SGL:</strong> R$ 675</p>

      <p><strong style="font-size: 15px;color: #10724c">Total da sua compra:</strong><br>R$ 1.575</p>

      <p><strong style="font-size: 15px;color: #10724c">Formas de Pagamento:</strong></p>
      <form action="page-inscsucesso.php" method="post" id="formPagamento">
          <table width="100%" border="0">
              <tbody>
              <tr>
                  <td width="5%"><input type="radio" name="formapagamento" id="formapagamento_1" value="boleto"></td>
                  <td><strong>Boleto Bancário</strong></td>
              </tr>
              <tr>
                  <td>&nbsp;</td>
                  <td><img src="images/treinamentos/boleto.png" alt="Boleto" height="50%"></td>
              </tr>
              <tr>
                  <td><input type="radio" name="formapagamento" id="formapagamento_2" value="cartao-credito"></td>
                  <td><strong>Cartão de Crédito</strong></td>
              </tr>
              <tr>
                  <td>&nbsp;</td>
                  <td><img src="images/treinamentos/cartoes-credito.png" alt="Cartões de Crédito" height="50%"></td>
              </tr>
              <tr>
                  <td><input type="radio" name="formapagamento" id="formapagamento_3" value="debito"></td>
                  <td><strong>Débito em Conta</strong></td>
              </tr>
              <tr>
                  <td>&nbsp;</td>
                  <td><img src="images/treinamentos/debito-financiamento.png" alt="Debito Online" height="50%"></td>
              </tr>
              </tbody>
          </table>
          <p><button type="submit" class="bt-verde">Concluir Cobrança</button> </p>
      </form>

  </div>

</div>
<?php include("footer.php"); ?>
