<?php
/**
 * Display a simple page
 * @package lbry
 */

get_header(); ?>

<?php
$featured = get_field('featured_post');
?>


    <section class="container">
<article class="content-text" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
<?php edit_post_link(__('Edit'), '<span class="edit-link">', '</span>'); ?>

<?php if ($featured) {
    ?>
    </article>
    </section>
    <?php
    include(locate_template('content-featured.php')); ?>
    <section class="container">
    <article class="content-text" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
}
?>

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . __('Pages:'),
            'after' => '</div>',
        ));
        ?>
    </div>
    </article>
    </section>

<?php
get_footer();
?>