<?php
/**
 * Created by PhpStorm.
 * User: wisleyaguiar
 * Date: 22/03/16
 * Time: 21:04
 */

// Opções do Tema
add_action('admin_menu', 'add_global_custom_options');
function add_global_custom_options()
{
	add_options_page('Opções do Site', 'Opções do Site', 'manage_options', 'functions','global_custom_options');
}

function global_custom_options()
{
	?>
	<div class="wrap">
		<h2 style="margin-bottom:30px;">Configurações do Sistema</h2>
		<form method="post" action="options.php" enctype="multipart/form-data">
			<?php wp_nonce_field('update-options') ?>
			<link href='//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css' rel='stylesheet' type='text/css'>
			<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
			<script>
				jQuery(function() {
					jQuery( "#tabs" ).tabs();
				});
			</script>
			<div id="tabs">
				<ul>
					<li><a href="#tabs-1">Informações</a></li>
				</ul>
				<div id="tabs-1">
					<h3>Informações Gerais</h3>
					<table class="form-table">
						<tbody>
						<tr>
							<th scope="row"><label for="urlsite2">URL do Site Principal:</label></th>
							<td><input type="text" name="urlsite2" value="<?php echo get_option('urlsite2'); ?>" class="regular-text" /></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>

			<p class="submit"><input type="submit" name="Submit" value="Salvar alterações" class="button button-primary" /></p>
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="urlsite2" />
		</form>
	</div>
	<?php
}