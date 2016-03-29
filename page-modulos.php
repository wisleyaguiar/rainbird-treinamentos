<?php 
/*
  * Template Name: Página de Módulos ou Cursos
  */
get_header();
setlocale(LC_MONETARY, 'pt_BR'); ?>

<?php include "status-logado.php"; ?>

<div class="preloading">
    <p><img src="<?php echo get_template_directory_uri(); ?>/images/preloading.gif" alt="Preloading" /><br>Processando...</p>
</div>
<div class="content" style="overflow:hidden; background:url('<?php echo get_template_directory_uri(); ?>/images/treinamentos/bg-tela-cadastro.jpg') no-repeat 0 0; height: 552px;">

<?php include "sidebar-user.php"; ?>

  <div style="width:612px; float:left; margin-left: 154px; padding-top: 30px; margin-right: 20px;">
    <?php if(isset($_GET['curso_id'])&&$_GET['curso_id']!="") {
        $curso_id = $_GET['curso_id'];
    ?>
    <h1 style="color: #10724c; font-size: 20px;">Escolha o(s) módulo(s) que deseja participar na <br><?php echo get_post($curso_id)->post_title; ?></h1>
      <?php $tipo_curso = get_post_meta($curso_id, 'tipo_treinamento', true); ?>

      <form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post" id="formEscolhaModulos">
          <?php if($tipo_curso=='tipo_modulo') { $total_salas = get_post_meta($curso_id, 'total_salas', true); ?>
          <input type="hidden" name="salas" id="salas" value="<?php echo $total_salas; ?>">
          <?php for($i=1;$i<=$total_salas;$i++) { ?>
          <table border="0" class="tabela-comerce" id="sala-<?php echo $i; ?>">
              <tbody>
              <tr>
                  <td class="titulo">Módulos<br>Sala <?php echo $i; ?></td>
                  <td class="titulo">&nbsp;</td>
                  <td class="titulo">Nome do Treinamento</td>
                  <td class="titulo" width="14%">SGL</td>
                  <td class="titulo" width="14%">DBL</td>
                  <td class="titulo" width="14%">Sem Hotel</td>
                  <td class="titulo" width="20%">Horário</td>
              </tr>
              <?php // WP_Query arguments
              $args = array (
                  'post_type'              => array( 'modulo' ),
                  'post_status'            => array( 'publish' ),
                  'posts_per_page'         => '-1',
                  'order'                  => 'ASC',
                  'orderby'                => 'menu_order',
                  'meta_query'             => array(
                      array(
                          'key'       => 'curso_associado',
                          'value'     => $curso_id,
                      ),
                      array(
                          'key'       => 'sala_modulo',
                          'value'     => $i,
                      ),
                  ),
              );

              // The Query
              $query_modulos = new WP_Query( $args );

              // The Loop
              if ( $query_modulos->have_posts() ) {

                  // Total do valor dos aptos
                  $total_apto_solteiro = 0;
                  $total_apto_duplo = 0;
                  $total_sem_hospedagem = 0;

                  while ( $query_modulos->have_posts() ) {
                      $query_modulos->the_post();
                      // Variávies
                      $cod_modulo = get_post_meta($post->ID,'cod_modulo', true);
                      $data_inicio_modulo_1 = get_post_meta($post->ID,'data_inicio_modulo_1', true);
                      $horario_inicio_modulo_1 = get_post_meta($post->ID,'horario_inicio_modulo_1', true);
                      $horario_termino_modulo_1 = get_post_meta($post->ID,'horario_termino_modulo_1', true);
                      $data_inicio_modulo_2 = get_post_meta($post->ID,'data_inicio_modulo_2', true);
                      $horario_inicio_modulo_2 = get_post_meta($post->ID,'horario_inicio_modulo_2', true);
                      $horario_termino_modulo_2 = get_post_meta($post->ID,'horario_termino_modulo_2', true);
                      $valor_apto_solteiro = get_post_meta($post->ID,'valor_apto_solteiro', true);
                      $valor_apto_duplo = get_post_meta($post->ID,'valor_apto_duplo', true);
                      $valor_sem_hospedagem = get_post_meta($post->ID,'valor_sem_hospedagem', true);

                      // Total do apto solterio
                      $total_apto_solteiro = $total_apto_solteiro + $valor_apto_solteiro;
                      $total_apto_duplo = $total_apto_duplo + $valor_apto_duplo;
                      $total_sem_hospedagem = $total_sem_hospedagem + $valor_sem_hospedagem;
              ?>
              <tr>
                  <td><?php echo $cod_modulo; ?></td>
                  <td><input type="checkbox" name="modulo[<?php echo $i; ?>][]" id="modulo-<?php echo $post->ID; ?>" value="<?php echo $post->ID; ?>"></td>
                  <td><label for="modulo-<?php echo $post->ID; ?>"><?php the_title(); ?></label></td>
                  <td><label><input type="radio" disabled name="modulo-<?php echo $post->ID; ?>-valor" id="<?php echo $post->ID; ?>-valor-sgl" value="<?php echo $valor_apto_solteiro; ?>"><?php echo money_format('%.2n', $valor_apto_solteiro) ?></label></td>
                  <td><label><input type="radio" disabled name="modulo-<?php echo $post->ID; ?>-valor" id="<?php echo $post->ID; ?>-valor-dbl" value="<?php echo $valor_apto_duplo; ?>"><?php echo money_format('%.2n', $valor_apto_duplo) ?></label></td>
                  <td><label><input type="radio" disabled name="modulo-<?php echo $post->ID; ?>-valor" id="<?php echo $post->ID; ?>-valor-sh" value="<?php echo $valor_sem_hospedagem; ?>"><?php echo money_format('%.2n', $valor_sem_hospedagem) ?></label></td>
                  <td><?php echo substr($data_inicio_modulo_1,0,5); ?> das <?php echo substr($horario_inicio_modulo_1,0,2); ?>h às <?php echo substr($horario_termino_modulo_1,0,2); ?>h<br>
                      <?php if(!empty($data_inicio_modulo_2)) { ?>
                      <?php echo substr($data_inicio_modulo_2,0,5); ?> das <?php echo substr($horario_inicio_modulo_2,0,2); ?>h às <?php echo substr($horario_termino_modulo_2,0,2); ?>h
                      <?php } ?>
                  </td>
              </tr>
              <?php }
                  $percentual_desconto = get_post_meta($curso_id, 'num_desc_vista', true) / 100;
                  $valor_final_apto_solteiro = $total_apto_solteiro - ($percentual_desconto * $total_apto_solteiro);
                  $valor_final_apto_duplo = $total_apto_duplo - ($percentual_desconto * $total_apto_duplo);
                  $valor_final_sem_hospedagem = $total_sem_hospedagem - ($percentual_desconto * $total_sem_hospedagem);
              ?>
                  <tr>
                      <td></td>
                      <td><input type="checkbox" name="modulo_todos" id="modulo_todos_<?php echo $i; ?>" value="<?php echo $i; ?>"></td>
                      <td><label for="modulo_todos_<?php echo $i; ?>">Todos os Módulos</label></td>
                      <td><label><input type="radio" disabled name="modulo-todos-<?php echo $i; ?>-valor" id="<?php echo $i; ?>-valor-sgl" value="valor_apto_solteiro"><?php echo money_format('%.2n', $valor_final_apto_solteiro) ?></label></td>
                      <td><label><input type="radio" disabled name="modulo-todos-<?php echo $i; ?>-valor" id="<?php echo $i; ?>-valor-dbl" value="valor_apto_duplo"><?php echo money_format('%.2n', $valor_final_apto_duplo) ?></label></td>
                      <td><label><input type="radio" disabled name="modulo-todos-<?php echo $i; ?>-valor" id="<?php echo $i; ?>-valor-sh" value="valor_sem_hospedagem"><?php echo money_format('%.2n', $valor_final_sem_hospedagem) ?></label></td>
                      <td>Aproveite o desconto de <?php echo get_post_meta($curso_id, 'num_desc_vista', true) ?>% todos os módulos</td>
                  </tr>
              <?php } else {
                  // no posts found
                  echo '<tr><td colspan="7">Nenhum módulo cadastrado</td></tr>';
              }

              // Restore original Post Data
              wp_reset_postdata(); ?>
              </tbody>
          </table>
          <?php } ?>

          <p class="texto-right"><button type="submit" class="bt-verde">Avançar</button> </p>
              
          <?php } else if($tipo_curso=='tipo_simples') {
            $horario_inicio = get_post_meta($curso_id, 'horario_inicio', true);
            $horario_termino = get_post_meta($curso_id, 'horario_termino', true);
            $data_inicio_treinamento = get_post_meta($curso_id, 'data_inicio_treinamento', true);
            $data_termino_treinamento = get_post_meta($curso_id, 'data_termino_treinamento', true);
            $valor_apto_solteiro = get_post_meta($curso_id, 'valor_apto_solteiro', true);
            $valor_apto_duplo = get_post_meta($curso_id, 'valor_apto_duplo', true);
            $valor_sem_hospedagem = get_post_meta($curso_id, 'valor_sem_hospedagem', true);
          ?>
              <table border="0" class="tabela-comerce">
                  <tbody>
                  <tr>
                      <td class="titulo">&nbsp;</td>
                      <td class="titulo">&nbsp;</td>
                      <td class="titulo">Nome do Treinamento</td>
                      <td class="titulo" width="14%">SGL</td>
                      <td class="titulo" width="14%">DBL</td>
                      <td class="titulo" width="14%">Sem Hotel</td>
                      <td class="titulo" width="20%">Data/Horário</td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                      <td><input type="checkbox" checked disabled /></td>
                      <td><label><?php echo get_post($curso_id)->post_title; ?></label></td>
                      <td><label><input type="radio" name="curso-valor" id="curso-valor-sgl" value="<?php echo $valor_apto_solteiro; ?>"><?php echo money_format('%.2n', $valor_apto_solteiro) ?></label></td>
                      <td><label><input type="radio" name="curso-valor" id="curso-valor-dbl" value="<?php echo $valor_apto_duplo; ?>"><?php echo money_format('%.2n', $valor_apto_duplo) ?></label></td>
                      <td><label><input type="radio" name="curso-valor" id="curso-valor-sh" value="<?php echo $valor_sem_hospedagem; ?>"><?php echo money_format('%.2n', $valor_sem_hospedagem) ?></label></td>
                      <td>De <?php echo substr($data_inicio_treinamento,0,5); ?> à <?php echo substr($data_termino_treinamento,0,5); ?><br>
                          Das <?php echo substr($horario_inicio,0,2); ?>h às <?php echo substr($horario_termino,0,2); ?>h</td>
                  </tr>
                  </tbody>
              </table>
          <p class="texto-right"><button type="submit" class="bt-verde">Avançar</button> </p>
          <?php } else { ?>
            <p>Tipo de Curso não definido.</p>
          <?php } ?>
          <input type="hidden" name="tipo_curso" id="tipo_curso" value="<?php echo $tipo_curso; ?>">
          <input type="hidden" name="curso_id" id="curso_id" value="<?php echo $curso_id; ?>">
          <input type="hidden" name="user_cad" id="user_cad" value="<?php echo get_current_user_id(); ?>">
          <input type="hidden" name="action" id="action" value="processar_inscricao">
                    
      </form>
    <?php } else { ?>
        <h1 style="color: #10724c; font-size: 20px;">Nenhum curso/treinamento escolhido.</h1>
    <?php } ?>
  </div>

</div>
<?php get_footer(); ?>
