<?php
/*
 * Template Name: Página Minha Conta
 */
get_header(); ?>

<?php include "status-logado.php"; ?>

<div class="preloading">
    <p><img src="<?php echo get_template_directory_uri(); ?>/images/preloading.gif" alt="Preloading" /><br>Processando...</p>
</div>
<div class="content" style="overflow:hidden; background:url('<?php echo get_template_directory_uri(); ?>/images/treinamentos/bg-tela-cadastro.jpg') no-repeat 0 0; height: 552px;">

  <?php include "sidebar-user.php"; ?>

  <div style="width:612px; float:left; margin-left: 154px; padding-top: 30px; margin-right: 20px;">
    <h1 style="color: #10724c; font-size: 20px; margin-bottom: 30px;">Minha Conta</h1>

    <?php if(!isset($_GET['op'])) { ?>
    <ul class="lista-eventos">
      <li>
        <a href="page-minhaconta.php?p=meus-dados" class="box-capa"><i class="fa fa-list-alt"></i></a>
        <h2 class="tituloEvento">Atualizar Dados Cadastrais</h2>
        <a href="page-minhaconta.php?p=meus-dados" class="bt-entrar">Entrar</a>
      </li>
      <li>
        <a href="page-minhaconta.php?p=minhas-inscricoes" class="box-capa"><i class="fa fa-calendar-check-o"></i></a>
        <h2 class="tituloEvento">Minhas Inscrições</h2>
        <a href="page-minhaconta.php?p=minhas-inscricoes" class="bt-entrar">Entrar</a>
      </li>
      <li>
        <a href="page-minhaconta.php?p=meus-certificados" class="box-capa"><i class="fa fa-graduation-cap"></i></a>
        <h2 class="tituloEvento">Meus Certificados</h2>
        <a href="page-minhaconta.php?p=meus-certificados" class="bt-entrar">Entrar</a>
      </li>
    </ul>
    <?php } ?>

    <?php if(isset($_GET['op']) && $_GET['op']=='meus-dados') { ?>
      <div class="caixa-cadastro-completo">
        <h2>Meus Dados Pessoais</h2>
        <form action="page-minhaconta.php" method="post" id="formAtualizaCadastro">

          <div class="linha-input">
            <div class="col-1">
              <label>Nome</label>
              <input type="text" name="nomeCompleto" id="nomeCompleto" class="input-form">
            </div>
          </div>

          <div class="linha-input">
            <div class="col-1">
              <label>Endereço</label>
              <input type="text" name="endereco" id="endereco" class="input-form">
            </div>
          </div>

          <div class="linha-input">
            <div class="col-1">
              <label>Bairro</label>
              <input type="text" name="bairro" id="bairro" class="input-form">
            </div>
          </div>

          <div class="linha-input">
            <div class="col-2">
              <label>Cidade</label>
              <input type="text" name="cidade" id="cidade" class="input-form">
            </div>
            <div class="col-3">
              <label>Estado</label>
              <input type="text" name="estado" id="estado" class="input-form">
            </div>
          </div>

          <div class="linha-input">
            <div class="col-4">
              <label>CEP</label>
              <input type="text" name="cep" id="cep" class="input-form">
            </div>
            <div class="col-5">
              <label>E-mail</label>
              <input type="text" name="email" id="email" class="input-form">
            </div>
          </div>

          <div class="linha-input">
            <div class="col-6">
              <label>Telefone Fixo</label>
              <input type="text" name="telfixo" id="telfixo" class="input-form">
            </div>
            <div class="col-7">
              <label>Telefone Celular</label>
              <input type="text" name="cel" id="cel" class="input-form">
            </div>
          </div>

          <div class="linha-input">
            <div class="col-6">
              <label><input type="radio" name="sexo" id="sexo_1" value="M" class="radio-form"> Masculino</label>
            </div>
            <div class="col-7">
              <label><input type="radio" name="sexo" id="sexo_2" value="F" class="radio-form"> Feminino</label>
            </div>
          </div>

          <div class="linha-input">
            <div class="col-1">
              <label>CPF</label>
              <input type="text" name="cpf" id="cpf" class="input-form">
            </div>
          </div>

          <div class="linha-input">
            <div class="col-1">
              <label>RG</label>
              <input type="text" name="rg" id="rg" class="input-form">
            </div>
          </div>
          <p class="texto-right"><button type="submit" class="bt-verde">Salvar Dados</button> </p>
        </form>
      </div>
    <?php } ?>

    <?php if(isset($_GET['op']) && $_GET['op']=='minhas-inscricoes') { ?>
      <h2>Minhas Inscrições</h2>
      <br/>
      <table width="100%" border="0" class="tabela-comerce">
        <tbody>
        <tr>
          <td class="titulo">Nº Inscrição</td>
          <td class="titulo">Data</td>
          <td class="titulo">Informações</td>
          <td class="titulo">Forma Pg.</td>
          <td class="titulo">Status</td>
          <td class="titulo">Nota Fiscal</td>
        </tr>
        <tr>
          <td>8109833</td>
          <td>19/02/2016</td>
          <td>
            <strong style="color: #10724c">Treinamento escolhido:</strong><br>Academia Rain Brid - Salvador/BA - 29/fev a 04/mar<br><br>
            <strong style="color: #10724c">Módulos Selecionados:</strong><br>
            <strong>A2 - Produtos de Irrigação para Jardins e Gramados</strong><br><strong>DBL:</strong> R$ 900<br>
            <strong>C2 - Sistemas de Bombeamento</strong><br><strong>SGL:</strong> R$ 675<br><br>
            <strong style="color: #10724c">Total da sua compra:</strong><br>R$ 1.575
          </td>
          <td>Boleto Bancário<br><a href="#">2ª Via</a></td>
          <td><span style="color: red">Pendente</span></td>
          <td>Não disponível</td>
        </tr>
        </tbody>
      </table>
    <?php } ?>

    <?php if(isset($_GET['op']) && $_GET['op']=='meus-certificados') { ?>
        <h2>Meus Certificados</h2>
        <br/>
        <table width="100%" border="0" class="tabela-comerce">
            <tbody>
            <tr>
                <td class="titulo">Nº Inscrição</td>
                <td class="titulo">Data</td>
                <td class="titulo">Treinamento</td>
                <td class="titulo">Presença</td>
                <td class="titulo">Nota Geral</td>
                <td class="titulo">Certificado</td>
            </tr>
            <tr>
                <td>8109833</td>
                <td>19/02/2016</td>
                <td>
                    Academia Rain Brid - Salvador/BA - 29/fev a 04/mar
                </td>
                <td><span style="color:darkblue">80%</span></td>
                <td><span style="color: darkgreen">100pt</span></td>
                <td><a href="#"><i class="fa fa-download"></i> Disponível</a></td>
            </tr>
            </tbody>
        </table>
    <?php } ?>

  </div>

</div>
<?php get_footer(); ?>
