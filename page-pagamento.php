<?php
/*
 * Template Name: Página de Pagamento
 */
get_header();
setlocale(LC_MONETARY, 'pt_BR');
?>

<?php include "status-logado.php"; ?>

<div class="preloading">
    <p><img src="<?php echo get_template_directory_uri(); ?>/images/preloading.gif" alt="Preloading" /><br>Processando...</p>
</div>
<div class="content" style="overflow:hidden; background:url('<?php echo get_template_directory_uri(); ?>/images/treinamentos/bg-tela-cadastro.jpg') no-repeat 0 0; height: 552px;">

  <?php include "sidebar-user.php"; ?>

  <div style="width:612px; float:left; margin-left: 154px; padding-top: 30px; margin-right: 20px;">
    <h1 style="color: #10724c; font-size: 20px;">Conclusão de sua inscrição - Pagamento</h1>

    <?php if(isset($_POST)&&is_array($_POST)&&!empty($_POST)) {
        $curso_id = $_POST['curso_id'];
    ?>
      <p><strong style="font-size: 15px; color: #10724c">Treinamento escolhido:</strong><br><?php echo get_post($curso_id)->post_title; ?></p>

      <p><strong style="font-size: 15px;color: #10724c">Módulos Selecionados:</strong></p>

      <?php print_r($_POST); ?>

      <p><strong style="font-size: 15px;color: #10724c">Total da sua compra:</strong><br></p>

      <p><strong style="font-size: 15px;color: #10724c">Formas de Pagamento:</strong></p>
      <form action="page-inscsucesso.php" method="post" id="formPagamento">
          <table width="100%" border="0">
              <tbody>
              <tr>
                  <td width="5%"><input type="radio" name="formapagamento" id="formapagamento_1" value="boleto"></td>
                  <td><label for="formapagamento_1"><strong>Boleto Bancário</strong></label></td>
              </tr>
              <tr>
                  <td>&nbsp;</td>
                  <td><label for="formapagamento_1"><img src="<?php echo get_template_directory_uri(); ?>/images/treinamentos/boleto.png" alt="Boleto" height="50%"></td>
              </tr>
              <tr>
                  <td><input type="radio" name="formapagamento" id="formapagamento_2" value="cartao-credito"></td>
                  <td><label for="formapagamento_2"><strong>Cartão de Crédito</strong></label></td>
              </tr>
              <tr>
                  <td>&nbsp;</td>
                  <td><label for="formapagamento_2"><img src="<?php echo get_template_directory_uri(); ?>/images/treinamentos/cartoes-credito.png" alt="Cartões de Crédito" height="50%"></td>
              </tr>
              <tr>
                  <td><input type="radio" name="formapagamento" id="formapagamento_3" value="debito"></td>
                  <td><label for="formapagamento_3"><strong>Débito em Conta</strong></label></td>
              </tr>
              <tr>
                  <td>&nbsp;</td>
                  <td><label for="formapagamento_3"><img src="<?php echo get_template_directory_uri(); ?>/images/treinamentos/debito-financiamento.png" alt="Debito Online" height="50%"></label></td>
              </tr>
              </tbody>
          </table>
          <p><button type="submit" class="bt-verde">Concluir Cobrança</button> </p>
      </form>
    <?php } else { ?>
        <p>Dados de Inscrição não selecionados.</p>
    <?php } ?>
  </div>

</div>
<?php include("footer.php"); ?>
