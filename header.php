<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
       <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
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
                            <?php wp_nav_menu(array('theme_location' => 'footer-nav', 'container' => false, 'menu_class' => 'navigation')); ?>                    
        		</div>
                        <a href="<?php echo get_option('home'); ?>" class="logo" title="EXR">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/img/logo.png" alt="EXR" />
                        </a>
        		<div class="mobileOnly mobileNavBtn"></div>
            </div>

             <?php $bodyClasses = get_body_class(); 
                    if(in_array('we3-brokerage', $bodyClasses)){
                ?> 
                <div class="headerImage">
                        <h1><span class="headerCaption"> EXR Real Estate Professionals </span>
                        </h1>
                    <div class="headerSubcaption">
                        <h2>EXR's specialized team of real estate professionals are experts in their respective markets</h2>
                    </div>
                </div>
            <?php
                    }
             ?>

