<?php 
/*
  * Template Name: Página de Módulos ou Cursos
  */
get_header(); ?>

<?php include "status-logado.php"; ?>

<div class="preloading">
    <p><img src="<?php echo get_template_directory_uri(); ?>/images/preloading.gif" alt="Preloading" /><br>Processando...</p>
</div>
<div class="content" style="overflow:hidden; background:url('<?php echo get_template_directory_uri(); ?>/images/treinamentos/bg-tela-cadastro.jpg') no-repeat 0 0; height: 552px;">

<?php include "sidebar-user.php"; ?>

  <div style="width:612px; float:left; margin-left: 154px; padding-top: 30px; margin-right: 20px;">
    <h1 style="color: #10724c; font-size: 20px;">Escolha o(s) módulo(s) que deseja participar na <br>Academia Rain Brid - Salvador/BA</h1>

      <form action="page-pagamento.php" method="post" id="formEscolhaModulos">
          <table border="0" class="tabela-comerce">
              <tbody>
              <tr>
                  <td class="titulo">Módulos<br>Sala 1</td>
                  <td class="titulo">&nbsp;</td>
                  <td class="titulo">Nome do Treinamento</td>
                  <td class="titulo" width="14%">SGL</td>
                  <td class="titulo" width="14%">DBL</td>
                  <td class="titulo" width="14%">Sem Hotel</td>
                  <td class="titulo" width="20%">Horário</td>
              </tr>
              <tr>
                  <td>A2</td>
                  <td><input type="checkbox" name="modulo-a2" id="modulo-a2" value="a2"></td>
                  <td><label>Produtos de Irrigação para Jardins e Gramados</label></td>
                  <td><label><input type="radio" name="modulo-a2" id="modulo-a2-sgl" value="1100">R$ 1.100</label></td>
                  <td><label><input type="radio" name="modulo-a2" id="modulo-a2-dbl" value="900">R$ 900</label></td>
                  <td><label><input type="radio" name="modulo-a2" id="modulo-a2-sh" value="700">R$ 700</label></td>
                  <td>09:00 - 17:00 (Segunda)<br>
                      08:00 - 17:00 (Terça)</td>
              </tr>
              <tr class="branco">
                  <td>A1</td>
                  <td><input type="checkbox" name="modulo-a1" id="modulo-a1" value="a1"></td>
                  <td><label>Hidráulica Básica</label></td>
                  <td><label><input type="radio" name="modulo-a1" id="modulo-a1-sgl" value="275">R$ 275</label></td>
                  <td><label><input type="radio" name="modulo-a1" id="modulo-a1-dbl" value="225">R$ 225</label></td>
                  <td><label><input type="radio" name="modulo-a1" id="modulo-a1-sh" value="175">R$ 175</label></td>
                  <td>08:00 - 12:00 (Quarta)</td>
              </tr>
              <tr>
                  <td>A3</td>
                  <td><input type="checkbox" name="modulo-a3" id="modulo-a3" value="a3"></td>
                  <td><label>Projetos de Irrigação para Jardins e Gramados</label></td>
                  <td><label><input type="radio" name="modulo-a2" id="modulo-a3-sgl" value="825">R$ 825</label></td>
                  <td><label><input type="radio" name="modulo-a2" id="modulo-a3-dbl" value="675">R$ 675</label></td>
                  <td><label><input type="radio" name="modulo-a2" id="modulo-a3-sh" value="525">R$ 525</label></td>
                  <td>13:00 - 17:00 (Quarta)<br>
                      08:00 - 17:00 (Quinta)</td>
              </tr>
              <tr class="branco">
                  <td>C2</td>
                  <td><input type="checkbox" name="modulo-c2" id="modulo-c2" value="c2"></td>
                  <td><label>Sistemas de Bombeamento</label></td>
                  <td><label><input type="radio" name="modulo-a2" id="modulo-c2-sgl" value="550">R$ 550</label></td>
                  <td><label><input type="radio" name="modulo-a2" id="modulo-c2-dbl" value="450">R$ 450</label></td>
                  <td><label><input type="radio" name="modulo-a2" id="modulo-c2-sh" value="350">R$ 350</label></td>
                  <td>08:00 - 17:00 (Sexta)</td>
              </tr>
              <tr>
                  <td>&nbsp;</td>
                  <td><input type="checkbox" name="modulo-all2" id="modulo-all" value="all"></td>
                  <td><label>Faça todos os cursos desta classe com 5% de desconto por:</label></td>
                  <td><label><input type="radio" name="modulo-all" id="modulo-all-sgl" value="2612.50">R$ 2.612,50</label></td>
                  <td><label><input type="radio" name="modulo-all" id="modulo-all-dbl" value="2137.50">R$ 2.137,50</label></td>
                  <td><label><input type="radio" name="modulo-all" id="modulo-all-sh" value="1662.50">R$ 1.662,50</label></td>
                  <td>&nbsp;</td>
              </tr>
              </tbody>
          </table>

          <p class="texto-right"><button type="submit" class="bt-verde">Avançar</button> </p>

      </form>

  </div>

</div>
<?php get_footer(); ?>
