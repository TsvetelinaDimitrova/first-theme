<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo ('stylesheet_url');?>"/>
	<link rel="shorcut icon" href="/image/logo.png">

	<?php wp_head();?>

</head>
<body>
	<div class="main-page">
		<header class="page-header">
			<div class="page-header-main">
				<a class="site-title" href="index.php"><?php echo get_bloginfo('name');?></a>
				<?php
				if(function_exists('the_custom_logo')){
					$custom_logo_id = get_theme_mod('custom_logo');
					$logo = wp_get_attachment_image_src($custom_logo_id);
				}
				?>
				<img class="logo" src="<?php echo $logo[0] ?>" alt="logo">
			</div>
		</header>
		<div class="navigation">
			<nav class="primary-menu">
				<?php 
					wp_nav_menu(
						array(
						'container_class' => 'primary-menu',
						'theme_location' => 'primary',
						)
					);
				?>
			</nav>
		</div>
		<div class="page">
			<div class= "widget">
				<aside>
					<?php if(is_active_sidebar('primary-sidebar') ):?>	
						<?php dynamic_sidebar('primary-sidebar');?>
					<?php endif;?>

					<?php if(is_active_sidebar('secondary-sidebar') ):?>	
						<?php dynamic_sidebar('secondary-sidebar');?>
					<?php endif;?>
				</aside>
			</div>		
   