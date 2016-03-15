<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="SHORTCUT ICON" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
<title><?php wp_title(); ?></title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
  <?php wp_head(); ?>
</head>
<body>
<div id="dialog-message" title="Download complete">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Your files have downloaded successfully into the My Downloads folder.
  </p>
  <p>
    Currently using <b>36% of your storage space</b>.
  </p>
</div>
<div class="mainContent">
  <header>
    <div class="logo"><a href="<?php echo esc_attr_e( $options['urlsite2'] ); ?>" title="Voltar à Home"><img src="<?php echo get_template_directory_uri(); ?>/images/RainBirdLogo.gif" width="220" height="50" alt=""/></a></div>
    <div class="boxMenuHeader">
      <nav id="menuHeader">
        <ul>
          <li><a href="<?php echo esc_attr_e( $options['urlsite2'] ); ?>/sobre-rain-bird.php">Institucional</a></li>
          <li><a href="<?php echo esc_attr_e( $options['urlsite2'] ); ?>/golf.php">Golf</a></li>
          <li><a href="<?php echo esc_attr_e( $options['urlsite2'] ); ?>/mineracao.php">Mineração</a></li>
          <li><a href="<?php echo esc_attr_e( $options['urlsite2'] ); ?>/servicos.php" class="menuAtivo">Serviços</a></li>
          <li><a href="<?php echo esc_attr_e( $options['urlsite2'] ); ?>/onde-comprar.php">Rede de Atendimento</a></li>
        </ul>
      </nav>
    </div>
    <div class="boxBusca">
    <style type="text/css">
		.cse .gsc-control-cse, .gsc-control-cse {
			padding:0!important;
		}
	</style>
    <script>
  (function() {
    var cx = '017089210604982231390:vuzxgzjs9m8';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
    </div>
    <div class="clear"></div>
</header>