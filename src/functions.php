<?php

define('LBRY_BASE_PATH', get_template_directory());
define('LBRY_BASE_URI', get_template_directory_uri());
define('LBRY_ASSETS_URI', LBRY_BASE_URI . '/assets');
define('LBRY_BUILD_URI', LBRY_BASE_URI . '/build');
define('LBRY_VERSION', '1.0');

function lbry_setup()
{
    add_theme_support('html5', array('search-form', 'gallery'));
    add_theme_support('automatic-feed-links');

    global $content_width;
    $content_width = 1480;

    register_nav_menu('header', __('Header menu', 'lbry'));
    register_nav_menu('footer', __('Footer menu', 'lbry'));
}
add_action('after_setup_theme', 'lbry_setup', 11);

class lbry_enqueue {
    function theme_scripts() {
        wp_enqueue_script('lbry-main-js', get_stylesheet_directory_uri() . '/js/scripts.js', NULL, NULL, true);
        wp_enqueue_style('lbry-main-css', get_stylesheet_uri() , array(), LBRY_VERSION, 'all');
    }
}

class lbry_theme
{
    protected $theme_enqueue;

    function __construct()
    {
        $this->theme_enqueue = new lbry_enqueue();
    }

    function theme_enqueue()
    {
        $this->theme_enqueue->theme_scripts();
    }

    function theme_setup()
    {
        add_theme_support('title-tag');
    }
}

$lbry_theme = new lbry_theme();
add_action('wp_enqueue_scripts', array($lbry_theme, 'theme_enqueue'));
add_action('after_setup_theme', array($lbry_theme, 'theme_setup'));

function post_single_small($category, $posts_per_page = 4)
{
    $category = ucfirst($category);
    $category_id = get_cat_ID($category);
    $link = get_category_link($category_id);

    echo "<h2 class='text-center'>$category articles</h2>";
    echo "<div class='margin-bottom-1'>&nbsp;</div>";

    $query = new WP_Query(array(
        'posts_per_page' => $posts_per_page,
        'category_name' => $category,
        'orderby' => 'date'
    ));

    echo '<div class="grid full-width margin-bottom">';
    if ($query->have_posts()) {
        echo '<div class="row">';
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('content', 'single-small');
        }
        echo '</div>';
        echo '<a href="' . $link . '" class="btn--ghost">More ' . strtolower($category) . ' articles</a>';
        echo "<div class='margin-bottom'>&nbsp;</div>";
    }
    echo '</div>';
}

function the_breadcrumb()
{
    $sep = ' ⟩ ';
    if (!is_front_page()) {
        // Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<b>';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . '</b>' . $sep;

        // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single()) {
            $categories = get_the_category();
            foreach ($categories as &$category) {
                echo '<b>' . '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>' . '</b>' . $sep;
            }
        }

        // If the current page is a single post, show its title with the separator
        if (is_single()) {
            the_title();
        }

        // If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }

        // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()) {
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ($page_for_posts_id) {
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }
        echo '</div>';
    }
}

function catch_first_image()
{
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

    if (empty($first_img)) { //Defines a default image
        $first_img = null;
    }
    return $first_img;
}

?>