<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/css/jquery.nouislider.pips.css">
	    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/css/jquery.nouislider.css">
        <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/css/mobile.css">
        <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/css/prettyPhoto.css">
        <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="container">
            <div class="header">
                <?php wp_nav_menu(array('theme_location' => 'top-right', 'container' => false, 'menu_class' => 'navigation nav_right desktopOnly')); ?>
  
                <div class="navigationWrapper mobileOnly">
                            <?php wp_nav_menu(array('theme_location' => 'top-right', 'container' => false, 'menu_class' => 'navigation')); ?>
                            <?php wp_nav_menu(array('theme_location' => 'top-left', 'container' => false, 'menu_class' => 'navigation')); ?>                    
        		</div>
                        <a href="<?php echo get_option('home'); ?>" class="logo" title="EXR">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/img/logo.png" alt="EXR" />
                        </a>
        		<div class="mobileOnly mobileNavBtn"></div>
            </div>
