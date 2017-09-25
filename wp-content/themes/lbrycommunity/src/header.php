<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title><?php wp_title('-', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <div id="wrap-header" class="wrap-header">
        <header id="masthead" class="site-header grid center">
            <div class="row center">
                <div class="col center">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <img class="img-header" src="<?php echo get_bloginfo('template_url') ?>/images/logo.svg"/>
                    </a>
                </div>

                <div class="flex"></div>

                <button id="responsive-menu-toggle"><?php _e('Menu', 'voidx'); ?></button>
                <nav id="site-navigation" class="site-navigation col">
                    <div id="responsive-menu"><?php wp_nav_menu(array('theme_location' => 'header', 'menu_id' => 'menu-header', 'menu_class' => 'menu-inline')); ?></div>
                </nav>

            </div>
        </header>
    </div>
    <div id="wrap-main" class="wrap-main">
