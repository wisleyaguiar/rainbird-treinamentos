<?php
include("header.php"); ?>

<div class="content" style="overflow:hidden; background:url('images/treinamentos/bg-tela-cadastro.jpg') no-repeat 0 0; height: 552px;">
  <div style="width:690px; float:left; margin-left: 254px; padding-top: 30px;">
    <h1 style="color: #10724c; font-size: 20px;">Cadastro de pessoa física - Treinamentos Rain Bird</h1>

    <div class="caixa-cadastro-completo">
      <h2>FICHA DE INSCRIÇÃO</h2>
      <small>TREINAMENTOS RAIN BIRD - 2016</small>
      <form action="page-cadfatura.php" method="post" id="formCadastroCompleto">

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
            <input type="text" name="email" id="email" class="input-form" value="<?php echo $_POST['email'] ?>">
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

        <div class="linha-input">
          <div class="col-6">
            <p><a href="#" class="bt-verde"><< Voltar</a></p>
          </div>
          <div class="col-6">
            <p class="texto-right"><button type="submit" class="bt-verde">Avançar</button> </p>
          </div>
        </div>

      </form>
    </div>

  </div>
</div>
<?php include("footer.php"); ?>
