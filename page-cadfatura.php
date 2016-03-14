<?php
include("header.php"); ?>

<div class="content" style="overflow:hidden; background:url('images/treinamentos/bg-tela-cadastro.jpg') no-repeat 0 0; height: 552px;">
  <div style="width:690px; float:left; margin-left: 254px; padding-top: 30px;">
    <h1 style="color: #10724c; font-size: 20px;">Cadastro de pessoa física - Treinamentos Rain Bird</h1>

    <div class="caixa-cadastro-completo">
      <h2>FATURAMENTO</h2>
      <P>A Rain Bird  Ltda. emitirá nota fiscal de serviços aos participantes. Favor informar os dados abaixo, somente se houver necessidade de emissão da Nota Fiscal para Pessoa Jurídica:</P>
      <form action="page-cadsucesso.php" method="post" id="formCadastroCompleto">

        <div class="linha-input">
          <div class="col-1">
            <label>Nota Fiscal em nome de</label>
            <input type="text" name="nomeNota" id="nomeNota" class="input-form">
          </div>
        </div>

        <div class="linha-input">
          <div class="col-1">
            <label>Endereço</label>
            <input type="text" name="enderecoFatura" id="enderecoFatura" class="input-form">
          </div>
        </div>

        <div class="linha-input">
          <div class="col-1">
            <label>Bairro</label>
            <input type="text" name="bairroFatura" id="bairroFatura" class="input-form">
          </div>
        </div>

        <div class="linha-input">
          <div class="col-2">
            <label>Cidade</label>
            <input type="text" name="cidadeFatura" id="cidadeFatura" class="input-form">
          </div>
          <div class="col-3">
            <label>Estado</label>
            <input type="text" name="estadoFatura" id="estadoFatura" class="input-form">
          </div>
        </div>

        <div class="linha-input">
          <div class="col-1">
            <label>CEP</label>
            <input type="text" name="cepFatura" id="cepFatura" class="input-form">
          </div>
        </div>

        <div class="linha-input">
          <div class="col-1">
            <label>CNPJ ou CPF</label>
            <input type="text" name="cnpjcpfFatura" id="cnpjcpfFatura" class="input-form">
          </div>
        </div>

        <div class="linha-input">
          <div class="col-1">
            <label>Inscrição Estadual</label>
            <input type="text" name="ie" id="ie" class="input-form">
          </div>
        </div>
        <p>Obs.: A nota fiscal só será emitida após o pagamento integral da opção feita pelo curso.</p>
        <div class="linha-input">
          <div class="col-6">
            <a href="#" class="bt-verde" style="margin-top: 5px; padding: 6px"><< Voltar</a>
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
