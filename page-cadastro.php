<?php
/*
 * Template Name: Página de Cadastro de Usuários
 */
get_header(); ?>

<div class="preloading">
  <p><img src="<?php echo get_template_directory_uri(); ?>/images/preloading.gif" alt="Preloading" /><br>Processando...</p>
</div>
<div class="content" style="overflow:hidden; background:url('<?php echo get_template_directory_uri(); ?>/images/treinamentos/bg-tela-cadastro.jpg') no-repeat 0 0; height: 552px;">
  <div style="width:690px; float:left; margin-left: 254px; padding-top: 20px;">
    <h1 style="color: #10724c; font-size: 20px;">Cadastro de pessoa física - Treinamentos Rain Bird</h1>

    <div class="caixa-cadastro-completo">
      <h2>FICHA DE INSCRIÇÃO</h2>
      <small>TREINAMENTOS RAIN BIRD - 2016</small>
      <form action="<?php echo home_url(); ?>" method="post" id="formCadastroCompleto">

        <div class="linha-input">
          <div class="col-1">
            <label>Nome Completo</label>
            <input type="text" name="nomeCompleto" id="nomeCompleto" class="input-form" style="text-transform: uppercase;" minlength="3" required>
          </div>
        </div>

        <div class="linha-input">
          <div class="col-1">
            <label>Endereço</label>
            <input type="text" name="endereco" id="endereco" class="input-form" required>
          </div>
        </div>

        <div class="linha-input">
          <div class="col-1">
            <label>Bairro</label>
            <input type="text" name="bairro" id="bairro" class="input-form" required>
          </div>
        </div>

        <div class="linha-input">
          <div class="col-2">
            <label>Cidade</label>
            <input type="text" name="cidade" id="cidade" class="input-form" required>
          </div>
          <div class="col-3">
            <label>Estado</label>
              <select name="estado" id="estado" class="input-form" required>
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
          <div class="col-4">
            <label>CEP</label>
            <input type="text" name="cep" id="cep" class="input-form" required>
          </div>
          <div class="col-5">
            <label>E-mail</label>
            <input type="email" name="email" id="email" class="input-form" value="<?php echo $_POST['email'] ?>" required>
          </div>
        </div>

        <div class="linha-input">
          <div class="col-6">
            <label>Telefone Fixo</label>
            <input type="text" name="telfixo" id="telfixo" class="input-form" minlength="14" maxlength="15" required>
          </div>
          <div class="col-7">
            <label>Telefone Celular</label>
            <input type="text" name="cel" id="cel" class="input-form" minlength="14" maxlength="15" required>
          </div>
        </div>

        <div class="linha-input">
          <div class="col-6">
            <label><input type="radio" name="sexo" id="sexo_1" value="M" class="radio-form" required> Masculino</label>
          </div>
          <div class="col-7">
            <label><input type="radio" name="sexo" id="sexo_2" value="F" class="radio-form" required> Feminino</label>
          </div>
        </div>

        <div class="linha-input">
              <div class="col-6">
                <label>CPF</label>
                <input type="text" name="cpf" id="cpf" class="input-form" maxlength="14" minlength="14" required>
              </div>
            <div class="col-7">
                <label>RG</label>
                <input type="text" name="rg" id="rg" class="input-form" minlength="4" required>
            </div>
        </div>

          <div class="linha-input">
              <div class="col-1">
                  <label>Nome de Usuário (somente letras e números)</label>
                  <input type="text" name="nome_user" id="nome_user" class="input-form" required>
              </div>
          </div>

          <div class="linha-input">
              <div class="col-1">
                  <label>Senha (crie uma senha segura)</label>
                  <input type="password" name="senha_user" id="senha_user" class="input-form" required>
              </div>
          </div>

        <div class="linha-input">
          <div class="col-6">
            <p><a href="<?php echo home_url('/'); ?>" class="bt-verde"><< Voltar</a></p>
          </div>
          <div class="col-6">
            <p class="texto-right"><button type="submit" class="bt-verde">Avançar</button></p>
          </div>
        </div>

      </form>
    </div>

  </div>
</div>
<?php get_footer(); ?>
