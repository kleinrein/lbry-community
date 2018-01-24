<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr">
<head>
    <!-- Meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="description" content="<?php bloginfo('description') ?>">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="msapplication-config" content="<?php echo get_bloginfo('template_url') ?>/browserconfig.xml"/>
    <meta name="theme-color" content="#ffffff">

    <title><?php wp_title('-', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.3.11/tiny-slider.css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_bloginfo('template_url') ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_bloginfo('template_url') ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_bloginfo('template_url') ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_bloginfo('template_url') ?>/manifest.json">
    <link rel="mask-icon" href="<?php echo get_bloginfo('template_url') ?>/safari-pinned-tab.svg" color="#5bbad5">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111638283-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-111638283-1');
    </script>

    <?php wp_head(); ?>
</head>
<body>
<div class="wrapper">
    <div class="grid">
        <header class="row center">
            <div class="flex" style="z-index: 100;">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <img class="img-header" src="<?php echo get_bloginfo('template_url') ?>/images/lbrycommunity.svg"/>
                </a>
            </div>
            <div class="col"></div>
            <nav class="menu-main">
                <div id="responsive-menu"><?php wp_nav_menu(array('theme_location' => 'header', 'menu_id' => 'menu-header', 'menu_class' => 'menu-inline')); ?></div>
            </nav>
            <div class="menu-full-screen">
                <?php wp_nav_menu(array('menu' => 'full', 'theme_location' => 'header', 'menu_class' => 'menu-full-screen-content')); ?>
                <?php get_search_form(); ?>
            </div>
            <button class="btn--nav">Menu <span></span><span></span></button>
        </header>
    </div>