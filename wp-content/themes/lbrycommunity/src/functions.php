<?php // ==== FUNCTIONS ==== //

// Load the configuration file for this installation; all options are set here
if (is_readable(trailingslashit(get_stylesheet_directory()) . 'functions-config.php'))
    require_once(trailingslashit(get_stylesheet_directory()) . 'functions-config.php');

// Load configuration defaults for this theme; anything not set in the custom configuration (above) will be set here
require_once(trailingslashit(get_stylesheet_directory()) . 'functions-config-defaults.php');

// An example of how to manage loading front-end assets (scripts, styles, and fonts)
require_once(trailingslashit(get_stylesheet_directory()) . 'inc/assets.php');

// Required to demonstrate WP AJAX Page Loader (as WordPress doesn't ship with even simple post navigation functions)
require_once(trailingslashit(get_stylesheet_directory()) . 'inc/navigation.php');

// Only the bare minimum to get the theme up and running
function voidx_setup()
{

    // HTML5 support; mainly here to get rid of some nasty default styling that WordPress used to inject
    add_theme_support('html5', array('search-form', 'gallery'));

    // Automatic feed links
    add_theme_support('automatic-feed-links');

    // $content_width limits the size of the largest image size available via the media uploader
    // It should be set once and left alone apart from that; don't do anything fancy with it; it is part of WordPress core
    global $content_width;
    $content_width = 960;

    // Register header and footer menus
    register_nav_menu('header', __('Header menu', 'voidx'));
    register_nav_menu('footer', __('Footer menu', 'voidx'));

}

add_action('after_setup_theme', 'voidx_setup', 11);

// Sidebar declaration
function voidx_widgets_init()
{
    register_sidebar(array(
        'name' => __('Main sidebar', 'lbrycommunity'),
        'id' => 'sidebar-main',
        'description' => __('Appears to the right side of most posts and pages.', 'lbrycommunity'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
}

add_action('widgets_init', 'voidx_widgets_init');


function post_single_small($category, $posts_per_page = 4)
{
    $category = ucfirst($category);

    echo "<h2 class='text-center'>$category articles</h2>";

    $query = new WP_Query(array(
        'posts_per_page' => $posts_per_page,
        'category_name' => $category,
    ));

    echo '<div class="grid full-width margin-bottom">';
    if ($query->have_posts()) {
        echo '<div class="row">';
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('content', 'single-small');
        }
        echo '</div>';
    }
    echo '</div>';
}