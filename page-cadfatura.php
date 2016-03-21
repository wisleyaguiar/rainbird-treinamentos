<?php
/*
 * Template Name: Cadastro de Faturamento
 */
get_header(); ?>
<div class="preloading">
    <p><img src="<?php echo get_template_directory_uri(); ?>/images/preloading.gif" alt="Preloading" /><br>Processando...</p>
</div>
<div class="content" style="overflow:hidden; background:url('<?php echo get_template_directory_uri(); ?>/images/treinamentos/bg-tela-cadastro.jpg') no-repeat 0 0; height: 552px;">
  <div style="width:690px; float:left; margin-left: 254px; padding-top: 30px;">
    <h1 style="color: #10724c; font-size: 20px;">Cadastro de pessoa física - Treinamentos Rain Bird</h1>

    <div class="caixa-cadastro-completo">
      <h2>FATURAMENTO</h2>
      <P>A Rain Bird  Ltda. emitirá nota fiscal de serviços aos participantes. Favor informar os dados abaixo, somente se houver necessidade de emissão da Nota Fiscal para Pessoa Jurídica:</P>
      <form action="<?php echo home_url(); ?>" method="post" id="formCadFatura">

        <div class="linha-input">
          <div class="col-1">
            <label>Nota Fiscal em nome de</label>
            <input type="text" name="nomeNota" id="nomeNota" class="input-form" minlength="3" required>
          </div>
        </div>

        <div class="linha-input">
          <div class="col-1">
            <label>Endereço</label>
            <input type="text" name="enderecoFatura" id="enderecoFatura" class="input-form" required>
          </div>
        </div>

        <div class="linha-input">
          <div class="col-1">
            <label>Bairro</label>
            <input type="text" name="bairroFatura" id="bairroFatura" class="input-form" required>
          </div>
        </div>

        <div class="linha-input">
          <div class="col-2">
            <label>Cidade</label>
            <input type="text" name="cidadeFatura" id="cidadeFatura" class="input-form" required>
          </div>
          <div class="col-3">
            <label>Estado</label>
            <select name="estadoFatura" id="estadoFatura" class="input-form" required>
              <option value="">Selecione</option>
              <option value="AC">Acre</option>
              <option value="AL">Alagoas</option>
              <option value="AP">Amapá</option>
              <option value="AM">Amazonas</option>
              <option value="BA">Bahia</option>
              <option value="CE">Ceará</option>
              <option value="DF">Distrito Federal</option>
              <option value="ES">Espirito Santo</option>
              <option value="GO">Goiás</option>
              <option value="MA">Maranhão</option>
              <option value="MS">Mato Grosso do Sul</option>
              <option value="MT">Mato Grosso</option>
              <option value="MG">Minas Gerais</option>
              <option value="PA">Pará</option>
              <option value="PB">Paraíba</option>
              <option value="PR">Paraná</option>
              <option value="PE">Pernambuco</option>
              <option value="PI">Piauí</option>
              <option value="RJ">Rio de Janeiro</option>
              <option value="RN">Rio Grande do Norte</option>
              <option value="RS">Rio Grande do Sul</option>
              <option value="RO">Rondônia</option>
              <option value="RR">Roraima</option>
              <option value="SC">Santa Catarina</option>
              <option value="SP">São Paulo</option>
              <option value="SE">Sergipe</option>
              <option value="TO">Tocantins</option>
            </select>
          </div>
        </div>

        <div class="linha-input">
          <div class="col-1">
            <label>CEP</label>
            <input type="text" name="cepFatura" id="cepFatura" class="input-form" maxlength="9" minlength="9" required>
          </div>
        </div>

        <div class="linha-input">
          <div class="col-1">
            <label>CNPJ</label>
            <input type="text" name="cnpjFatura" id="cnpjFatura" class="input-form" minlength="18" maxlength="18" required>
          </div>
        </div>

        <div class="linha-input">
          <div class="col-1">
            <label>Inscrição Estadual</label>
            <input type="text" name="ieFatura" id="ieFatura" class="input-form">
          </div>
        </div>
        <p>Obs.: A nota fiscal só será emitida após o pagamento integral da opção feita pelo curso.</p>
        <div class="linha-input">
          <div class="col-6">
            <a href="<?php echo home_url('/cadastro'); ?>" class="bt-verde" style="margin-top: 5px; padding: 6px"><< Voltar</a>
          </div>
          <div class="col-6">
            <input type="hidden" id="user_id" name="user_id" value="<?php echo $get_current_user_id(); ?>">
            <p class="texto-right"><button type="submit" class="bt-verde">Avançar</button> </p>
          </div>
        </div>

      </form>
    </div>

  </div>
</div>
<?php get_footer(); ?>
