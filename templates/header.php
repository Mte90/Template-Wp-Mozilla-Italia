<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <meta name="author" content="Francesco Lodolo & Daniele Scasciafratte">    
    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->    

    <!-- Bootstrap -->
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_directory'); ?>/assets/ico/apple-touch-icon-57-precomposed.png">
    
    <!-- Varie specifiche del tema -->
    <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/favicon.png" />
    <link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <link href="//www.mozilla.org/tabzilla/media/css/tabzilla.css" rel="stylesheet" />

    <?php 
      wp_enqueue_script('jquery');
      wp_head();       
    ?>  

    <script> 
      jQuery(document).ready(function() {
          jQuery('.dropdown > a').append('<b class="caret"></b>').dropdown();
          jQuery('.dropdown .sub-menu').addClass('dropdown-menu');
      });
    </script>
  </head>
<body>  
  <div class="container" id="bodycontainer">        
    <a href="http://www.mozilla.org/" id="tabzilla">mozilla</a>
    <header class="site-header" role="banner">
      <div class="head">
        <h1><a href="<?php echo get_settings('home'); ?>/">Mozilla Italia</a></h1>
        <h2>associazione italiana<br/>supporto e traduzione mozilla</h2>
      </div>  
      <div id="sociallinks">
        <a href="https://www.facebook.com/mozillaitalia"><img src="<?php bloginfo('template_directory'); ?>/img/facebook.png" alt="logo Facebook" title="Seguici su Facebook" /></a>
        <a href="https://twitter.com/mozillaitalia"><img src="<?php bloginfo('template_directory'); ?>/img/twitter.png" alt="logo Twitter" title="Seguici su Twitter" /></a></span>
        <a href="https://plus.google.com/communities/102357154385350664356"><img src="<?php bloginfo('template_directory'); ?>/img/googleplus.png" alt="logo Google+" title="Seguici su Google+" /></a>
        <a href="/feed"><img src="<?php bloginfo('template_directory'); ?>/img/rss.png" alt="logo Google+" title="Seguici con gli RSS" /></a></span>
      </div>     
    </header>
    <div class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand hidden-lg hidden-md" href="<?php echo home_url(); ?>/">Menu</a>   
			</div>
            <nav class="collapse navbar-collapse" role="navigation">
              <?php 
                wp_nav_menu( array(
                  'menu_class' => 'nav nav-pills',
                  'theme_location' => 'principale'
                ));
              ?>       
			</nav>
       </div>
    </div>