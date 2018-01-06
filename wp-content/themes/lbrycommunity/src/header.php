<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title><?php wp_title('-', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.3.11/tiny-slider.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="wrapper">
    <div class="grid">
        <header class="row center">
                <div class="flex">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <img class="img-header" src="<?php echo get_bloginfo('template_url') ?>/images/lbrycommunity.svg"/>
                    </a>
                </div>
                <div class="col"></div>
                <nav id="site-navigation" class="site-navigation col">
                    <div id="responsive-menu"><?php wp_nav_menu(array('theme_location' => 'header', 'menu_id' => 'menu-header', 'menu_class' => 'menu-inline')); ?></div>
                </nav>
                <div class="menu-full-screen">
                    <?php wp_nav_menu(array('menu' => 'full' ,'theme_location' => 'header', 'menu_class' => 'menu-full-screen-content')); ?>
                    <?php get_search_form(); ?>
                </div>
                <button class="btn--nav">Menu <span></span><span></span></button>
        </header>

    </div>